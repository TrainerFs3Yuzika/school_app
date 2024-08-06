<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {
        // Mengambil role pengguna yang sedang login
        $role = Auth::user()->role_name;

        // Memeriksa apakah role adalah 'Teacher' atau 'Super Admin'
        if ($role === 'Teachers' || $role === 'Super Admin') {
            // Ambil semua data assignment jika pengguna adalah 'Teacher' atau 'Super Admin'
            $assignments = Assignment::all();
        } else {
            // Ambil data assignment hanya untuk pengguna yang sedang login
            $assignments = Assignment::where('user_id', Auth::id())->get();
        }

        // Mengirim data ke view
        return view('assignments.index', compact('assignments'));
    }


    public function create()
    {
        $subjects = Subject::all();
        return view('assignments.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'subject_id' => 'required|exists:subjects,id',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $request->file('file')->store('assignments');

        Assignment::create([
            'assignment_name' => Auth::user()->name,
            'subject_id' => $request->subject_id,
            'user_id' => $request->user_id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('assignments.index')->with('success', 'Assignment uploaded successfully.');
    }

    public function show(Assignment $assignment)
    {
        // Authorization check
        $this->authorize('view', $assignment);

        return view('assignments.show', compact('assignment'));
    }

    public function edit(Assignment $assignment)
    {
        // Authorization check
        $this->authorize('update', $assignment);

        $subjects = Subject::all();
        return view('assignments.edit', compact('assignment', 'subjects'));
    }

    public function update(Request $request, Assignment $assignment)
    {
        // Authorization check
        $this->authorize('update', $assignment);

        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            Storage::delete($assignment->file_path);

            // Store new file
            $filePath = $request->file('file')->store('assignments');
            $assignment->file_path = $filePath;
        }

        $assignment->update([
            'subject_id' => $request->subject_id,
            'assignment_name' => Auth::user()->name,
        ]);

        return redirect()->route('assignments.index')->with('success', 'Assignment updated successfully.');
    }

    public function destroy(Assignment $assignment)
    {
        // Authorization check
        $this->authorize('delete', $assignment);

        // Delete file
        Storage::delete($assignment->file_path);

        // Delete assignment
        $assignment->delete();

        return redirect()->route('assignments.index')->with('success', 'Assignment deleted successfully.');
    }

    public function download($id)
    {
        $assignment = Assignment::findOrFail($id);

        // Authorization check
        $this->authorize('view', $assignment);

        // Check if file exists and return the file as a response
        if (Storage::exists($assignment->file_path)) {
            return Storage::download($assignment->file_path);
        }

        return redirect()->route('assignments.index')->with('error', 'File not found.');
    }
}
