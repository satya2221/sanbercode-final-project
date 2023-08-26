<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Alert;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());

        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $user = User::find(Auth::id());

        return view('user.edit_profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'age' => 'required|integer',
            'bio' => 'required',
            'address' => 'required|max:45',
        ]);

        User::find($id)->update([
            'age' => $request['age'],
            'bio' => $request['bio'],
            'address' => $request['address']
        ]);

        return redirect()->route('users.index')->with('success', 'User Profile updated successfully');
    }
}
