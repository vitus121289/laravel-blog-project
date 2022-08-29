<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }
    
    public function store() {

        User::create(request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'username' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:7', 'max:255']
        ]));

        return redirect('/');
    }
}
