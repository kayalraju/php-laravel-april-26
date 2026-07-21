<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function getAllStudent()
    {
        $students = Student::all();
        return response()->json([
            'status' => true,
            'version' => app()->version(),
            'message' => 'get All students',
            'total' => count($students),
            'data' => $students
        ], 200);
    }


    public function createStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'phone' => 'required',
           
        ]);
        // Proceed with saving the product if validation passes
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;;
        $student->save();
        
        return response()->json([
            'status' => true,
            'message' => 'student created successfully',
            'data' => $student
        ], 201);
    }
}


