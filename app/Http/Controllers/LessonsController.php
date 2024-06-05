<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lessons;
use App\Models\Subject;
use App\Models\ClassModel;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lessons::with('subject')->get();
        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::pluck('subject_name', 'id');
        $classes = ClassModel::pluck('class_name', 'id');
        return view('lessons.create', compact('subjects', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject_id'    => 'required',
            'class'         => 'required',
            'days'          => 'required',
            'time_start'    => 'required',
            'time_end'      => 'required'
        ]);

        $lessonsModel = new Lessons();
        $lessonsModel->subject_id = $validatedData['subject_id']; // Menggunakan validatedData untuk memastikan data yang valid
        $lessonsModel->class = $validatedData['class'];
        $lessonsModel->days = $validatedData['days'];
        $lessonsModel->time_start = $validatedData['time_start'];
        $lessonsModel->time_end = $validatedData['time_end'];
        $lessonsModel->save();

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lessons = Lessons::findOrFail($id);
        $subjects = Subject::pluck('subject_name', 'id');
        return view('lessons.edit', compact('lessons', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subject_id'    => 'required',
            'class'         => 'required',
            'days'          => 'required',
            'time_start'    => 'required',
            'time_end'      => 'required'
        ]);

        $lessonsModel = Lessons::findOrFail($id);
        $lessonsModel->subject_id = $validatedData['subject_id'];
        $lessonsModel->class = $validatedData['class'];
        $lessonsModel->days = $validatedData['days'];
        $lessonsModel->time_start = $validatedData['time_start'];
        $lessonsModel->time_end = $validatedData['time_end'];
        $lessonsModel->save();

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lessons $lessons)
    {
        $lessons->delete();
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully!');
    }
}
