<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }
    
    public function store() {

        User::create(request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'password' => ['required', 'min:7', 'max:255']
        ]));
        
        return redirect('/')->with('success', 'Your account has account has been created');
    }
}
