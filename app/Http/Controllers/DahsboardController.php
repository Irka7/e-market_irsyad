<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DahsboardController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function blog()
    {
        return view('blog');
    }
}
