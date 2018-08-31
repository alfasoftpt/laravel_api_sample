<?php

namespace App\Http\Controllers;

use App\Student;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    // list existing students
    public function index()
    {
        return Student::all();
    }

    // show specific student
    // automatically throws not found
    public function show(Student $student)
    {
        return $student;
    }

    // create new student
    public function store(Request $request)
    {
        
        // validate input with business requirements
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone_number' => 'required|integer'
        ]);

        // return 400 error and validation errors back to client
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        // store the record if validations passed
        $student = Student::create($request->all());

        return response()->json($student, 201);
    }

}