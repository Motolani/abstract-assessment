<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.dashboard');
    }

    public function inactive()
    {
        return view('users.inactive');
    }
}
