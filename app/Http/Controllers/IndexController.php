<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class IndexController extends Controller
{
    public function index()
    {
        return view('index')->with('users', User::all());
    }
}
