<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('students.index', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'batch' => 'required',
            'mobile' => 'required',
        ]);

        Student::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'batch' => $request->get('batch'),
            'mobile' => $request->get('mobile'),
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'batch' => 'required',
            'mobile' => 'required',
        ]);

        $student = Student::find($id);

        $student->name = $request->get('name');
        $student->email = $request->get('email');
        $student->batch = $request->get('batch');
        $student->mobile = $request->get('mobile');

        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}

