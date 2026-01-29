<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
    {
        $query = Subject::query();

        if ($search = $request->get('search')) {
            $query->where('availSubject', 'like', "%{$search}%");
        }

        $subjects= $query->latest()->paginate(10);
        return view('admin/subject.subjects', [
            'title'=>'Subjects',
            'subjects'=> $subjects,
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'availSubject'=>'required',
            'desc' => 'required',
        ]);
        Subject::create($request->only('availSubject', 'desc'));

        return redirect()->route('admin.subjects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'availSubject' => 'required',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update($request->only('availSubject'));

        return redirect()->route('admin.subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
