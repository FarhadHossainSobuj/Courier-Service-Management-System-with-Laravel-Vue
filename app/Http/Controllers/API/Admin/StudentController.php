<?php

namespace App\Http\Controllers\API\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Notifications\NewStudent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{

    // store student data 
    public function store(Request $request)
    {

        $request->validate([
            'email'      => 'required|email|unique:users',
            'roll'       => 'required',
            'reg'        => 'required',
            'department' => 'required'
        ]);
        $password = uniqid();

        $user = User::create([
            'email'      => $request->email,
            'department' => $request->department,
            'password'   => Hash::make($password),
            'user_type'  => 'student',
            'status'     => true
        ]);

        $user->student()->create([
            'roll' => $request->roll,
            'reg'  => $request->reg
        ]);
        if ($user) {
            Notification::route('mail', $user->email)->notify(new NewStudent($user->email, $password));
        }
    }
}