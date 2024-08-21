<?php

namespace App\Http\Controllers;

use App\Models\PembelajaranSiswa;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembelajaranSiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query PembelajaranSiswa dengan relasi subject, student, teacher
        $pembelajaranSiswaQuery = PembelajaranSiswa::with(['subject', 'student', 'teacher']);

        // Tambahkan filter pencarian jika ada input pencarian
        if ($search) {
            $pembelajaranSiswaQuery->where(function ($query) use ($search) {
                $query->whereHas('subject', function ($q) use ($search) {
                    $q->where('subject_name', 'like', "%{$search}%");
                })
                    ->orWhereHas('teacher', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        // Ambil hasil pencarian
        $pembelajaranSiswa = $pembelajaranSiswaQuery->get();

        return view('pembelajaran_siswa.index', compact('pembelajaranSiswa'));
    }


    public function create()
    {
        $subjects = Subject::all();
        $students = User::where('role_name', 'Student')->get();
        $teachers = User::where('role_name', 'Teachers')->get();
        return view('pembelajaran_siswa.create', compact('subjects', 'students', 'teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:users,id',
            'teacher_id' => 'required|exists:users,id',
            'materi_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $pembelajaranSiswa = new PembelajaranSiswa();
        $pembelajaranSiswa->subject_id = $request->subject_id;
        $pembelajaranSiswa->student_id = $request->student_id;
        $pembelajaranSiswa->teacher_id = $request->teacher_id;

        if ($request->hasFile('materi_file')) {
            $file = $request->file('materi_file');
            $path = $file->store('materi_files', 'public');
            $pembelajaranSiswa->materi_file = $path;
        }

        $pembelajaranSiswa->save();
        return redirect()->route('pembelajaran_siswa.index')->with('success', 'Pembelajaran Siswa created successfully.');
    }

    public function edit(PembelajaranSiswa $pembelajaranSiswa)
    {
        $subjects = Subject::all();
        $students = User::where('role_name', 'Student')->get();
        $teachers = User::where('role_name', 'Teachers')->get();
        return view('pembelajaran_siswa.edit', compact('pembelajaranSiswa', 'subjects', 'students', 'teachers'));
    }

    public function update(Request $request, PembelajaranSiswa $pembelajaranSiswa)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'student_id' => 'required|exists:users,id',
            'teacher_id' => 'required|exists:users,id',
            'materi_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $pembelajaranSiswa->subject_id = $request->subject_id;
        $pembelajaranSiswa->student_id = $request->student_id;
        $pembelajaranSiswa->teacher_id = $request->teacher_id;

        if ($request->hasFile('materi_file')) {
            if ($pembelajaranSiswa->materi_file && Storage::exists($pembelajaranSiswa->materi_file)) {
                Storage::delete($pembelajaranSiswa->materi_file);
            }

            $file = $request->file('materi_file');
            $path = $file->store('materi_files', 'public');
            $pembelajaranSiswa->materi_file = $path;
        }

        $pembelajaranSiswa->save();
        return redirect()->route('pembelajaran_siswa.index')->with('success', 'Pembelajaran Siswa updated successfully.');
    }

    public function destroy(PembelajaranSiswa $pembelajaranSiswa)
    {
        if ($pembelajaranSiswa->materi_file && Storage::exists($pembelajaranSiswa->materi_file)) {
            Storage::delete($pembelajaranSiswa->materi_file);
        }

        $pembelajaranSiswa->delete();
        return redirect()->route('pembelajaran_siswa.index')->with('success', 'Pembelajaran Siswa deleted successfully.');
    }

    public function getClassBySubject($subjectId)
    {
        $subject = Subject::find($subjectId);
        if ($subject) {
            return response()->json(['class' => $subject->class]);
        }
        return response()->json(['class' => null], 404);
    }
}
