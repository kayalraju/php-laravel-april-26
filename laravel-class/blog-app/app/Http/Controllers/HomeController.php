<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $user=[
            'name' => 'John Doe',
            'age' => 30,
            'hobbies' => ['reading', 'coding', 'hiking'],
            'address' => [
                'street' => '123 Main St',
                'city' => 'New York',
                'country' => 'USA'
            ]

        ];
        return view('index',[
            'user' => $user,
            'title' => 'Home'
        ]);
    }
    public function about(){
        return view('about');
    }
    public function user(){
        return view('user');
    }
}
