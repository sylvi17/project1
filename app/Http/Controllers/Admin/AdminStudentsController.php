<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Classroom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        $query = Student::query();

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('bday', 'like', "%{$search}%") 
                ->orWhere('gender', 'like', "%{$search}%") 
                ->orWhere('address', 'like', "%{$search}%")
                ->orWhereHas('classroom', function($subQuery) use ($search){
                    $subQuery->where('class', 'like', "%{$search}%");
                });
        }


        $students= $query->latest()->paginate(7);
        $classrooms = Classroom::all();
        return view('admin/student.students', [
            'title'=>'students',
            'students'=> $students,
            'classrooms' => $classrooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'classroom_id'=>'required|exists:classrooms,id',
            'email'=>'required|email|unique:students,email',
            'address'=>'required|string|max:255',
            'bday'=>'required|string|max:255',
            'gender'=>'required|string|max:255',
        ]);

        Student::create($validated);

        return redirect()->route('admin.students.index')->with('success', 'Student added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('classroom')->findOrFail($id);
        return view('admin.student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student= Student::findOrFail($id);
        $classrooms= Classroom::all();
        return view ('admin.student.edit', compact('student','classrooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $student= Student:: findOrFail($id);
        $validated= $request->validate([
            'name' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'address' => 'nullable|string|max:255',
            'bday' => 'required|date',
            'gender' => 'required|string|max:255',
        ]);

        $student->update($validated);

        return redirect()->route('admin.students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.students.index')->with('success', 'Student deleted successfully!');
    }
}
