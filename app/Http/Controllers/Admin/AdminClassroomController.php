<?php

namespace App\Http\Controllers\Admin;

use App\Models\Classroom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Classroom::query();

        if ($search = $request->get('search')) {
            $query->where('class', 'like', "%{$search}%");
        }

        $classrooms = $query->with('students')->latest()->paginate(10);
        return view('admin/classroom.classrooms', [
            'title'=>'Classrooms',
            'classrooms'=> $classrooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class'=>'required',
        ]);
        Classroom::create($request->only('class'));

        return redirect()->route('admin.classrooms.index');
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
    public function edit(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classroom.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'class' => 'required',
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->only('class'));

        return redirect()->route('admin.classrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
