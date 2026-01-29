<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminTeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::query();

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%") 
                ->orWhere('address', 'like', "%{$search}%")
                ->orWhereHas('subject', function($subQuery) use ($search){
                    $subQuery->where('availSUbject', 'like', "%{$search}%");
        });
        }

    $teachers = $query->with('subject')->latest()->paginate(10);
    $subjects = Subject::all();

    return view('admin.teacher.teachers', [
        'title' => 'teachers',
        'teachers' => $teachers,
        'subjects' => $subjects,  
    ]);
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.teacher.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:teachers,email',
            'phone'=> 'required|string|max:20',
            'address'=> 'nullable|string|max:255',
            'subject_id'=>'required|exists:subjects,id',
        ]);

        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher added successfully!');
    }

    public function show($id)
    {
        $teacher = Teacher::with('subject')->findOrFail($id);
        return view('admin.teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $subjects = Subject::all();

        return view('admin.teacher.edit', compact('teacher','subjects'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:teachers,email,' . $teacher->id,
            'phone'=> 'required|string|max:20',
            'address'=> 'nullable|string|max:255',
            'subject_id'=>'required|exists:subjects,id',
        ]);

        $teacher->update($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}