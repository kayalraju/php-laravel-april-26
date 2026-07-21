<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

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
        // $request->validate([
        //     'name' => 'required|max:50',
        //     'email' => 'required',
        //     'phone' => 'required',
           
        // ]);
        // // Proceed with saving the product if validation passes
        // $student = new Student();
        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->phone = $request->phone;;
        // $student->save();

        // return response()->json([
        //     'status' => true,
        //     'message' => 'student created successfully',
        //     'data' => $student
        // ], 201);
        try {

        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:50',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validator->errors()
            ], 422);
        }

        $student = Student::create([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);

    } catch (\Exception $e) {

        return response()->json([
            'status' => false,
            'message' => 'Something went wrong',
            'error' => $e->getMessage()
        ], 500);
    }
    }
}


