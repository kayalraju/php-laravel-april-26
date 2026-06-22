<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormHandallingController extends Controller
{
    public function index(){
        return view('studentform');
    }
    public function store(Request $request){
        // Handle form submission logic here

        //dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
        ]);

        // If validation passes, you can proceed with storing the data or performing other actions

        //dd($request->all());
        return 'Form submitted successfully!';
    }
}
