<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $otherUsers = User::where('is_admin', 0)->get();
        // dd($otherUsers);
        return view('admin.dashboard', ['otherUsers' => $otherUsers]);
    }
}
