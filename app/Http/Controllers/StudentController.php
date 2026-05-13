<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function create()
    {
        $students = Student::get(); 
        return view('students.create', compact('students'));
        info('table data shows under the form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:255'],
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer|between:5,15', 
            'gender' => 'required|string|in:Male,Female,Other',
            'course' => 'required|string|in:Other,BCA,MCA,Diploma,B.com,M.com',
            'skills' => 'required|string|in:Beginner,Intermediate,Advanced',
            'hobbies' => 'required|array|min:1',
            'hobbies.*' => 'string',//look inside the array and inspect every single item individually."
            'terms' => 'accepted',
        ]);
        info('validate input data');
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'gender' => $request->gender,
            'course' => $request->course,
            'skills' => $request->skills,
            'hobbies' => $request->hobbies,
            'terms' => $request->has('terms'),
        ]);
        info('create data successfully');
        return redirect()->route('students.create')->with('success', 'Student details saved successfully!');
    }
    public function destroy($id)
    {
        $stud = Student::findOrFail($id); 
        if(empty($stud)){
            return redirect()->back()->with('error','student id not found');
        }
        $stud->delete(); 
        info('delete data successfully');
        return redirect()->back()->with('success', 'Item deleted successfully!');
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        if(empty($student)){
            return redirect()->back()->with('error','student id not found!');
        }
        return view('students.edit', compact('student'));
        info('shows edit page');
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        if(empty($student))
        {
            return redirect()->back()->with('error','student id not found!');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'required|integer|between:5,15', 
            'gender' => 'required|string|in:Male,Female,Other',
            'course' => 'required|string|in:Other,BCA,MCA,Diploma,B.com,M.com',
            'skills' => 'required|string|in:Beginner,Intermediate,Advanced',
            'hobbies' => 'required|array|min:1',
            'hobbies.*' => 'string',
        ]);
        info('validate update form data');
        $student->update($request->all()); 
        info('update data successfully');
        return redirect()->route('students.create')->with('success', 'Student updated successfully');
    }

}