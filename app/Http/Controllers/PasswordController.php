<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('admin.password_change');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        $users = Auth::user();

        $user = User::find($users->id);

        $user->password = Hash::make($request->new_password);

        $user->save();


        return back()->with('success', 'Password changed successfully');
    }
}
