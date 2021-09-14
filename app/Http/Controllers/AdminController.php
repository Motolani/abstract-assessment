<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $otherUsers = User::where('is_admin', 0)->get();
        // dd($otherUsers);
        return view('admin.dashboard', ['otherUsers' => $otherUsers]);
    }

    public function activateUser(User $user)
    {
        return view('admin.activateuser', compact('user'));
    }

    public function updateStatus(Request $request, User $user)
    {

        // dd($user);
        $user->is_active = $request['is_active'];
        $user->save();

        $request->session()->flash('success', 'Your details have been successfully updated');
        return redirect()->back();
    }
}
