<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guardian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGuardianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Guardian::query();

        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%")
                 ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('telpon', 'like', "%{$search}%")
                ->orWhere('job', 'like', "%{$search}%");
        }

        $guardians = $query->latest()->paginate(10)->withQueryString();
        return view('admin/guardian.guardians',[
            'title'=>'Guardians',
            'guardians'=>$guardians,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated= $request->validate([
            'name'=>'required|string|max:255',
            'job'=>'required|string|max:255',
            'email'=>'required|email|unique:guardians,email',
            'telpon'=>'required|string|max:20',
            'address'=>'required|string|max:255',
            'gender'=>'required|string|max:255',

        ]);

        Guardian::create($validated);

        return redirect()->route('admin.guardians.index')->with('success', 'Guardian added successfully!');
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
        $guardian= Guardian::findOrFail($id);
        return view ('admin.guardian.edit', compact ('guardian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guardian= Guardian:: findOrFail($id);
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'job'=>'required|string|max:255',
            'email'=>'required|email|unique:students,email',
            'telpon'=>'required|string|max:20',
            'address'=>'required|string|max:255',
            'gender'=>'required|string|max:255',
        ]);

        $guardian->update($validated);

        return redirect()->route('admin.guardians.index')->with('success', 'Guardian updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guardian= Guardian::findOrFail($id);
        $guardian->delete();

        return redirect()->route('admin.guardians.index')->with('success', 'Guardian deleted successfully!');
    }
}
