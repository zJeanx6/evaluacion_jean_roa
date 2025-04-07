<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View{
        $typeusers = UserType::all();
        return view('auth.register', compact('typeusers'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'uid' => 'required|integer|digits_between:8,11|unique:users,uid', 
            'name' => 'required|string|min:3|max:100',
            'last_name' => 'required|string|min:3|max:100', 
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()], 
            'role_id' => 'required|integer|exists:user_types,id',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['uid'] = $data['uid'];
        User::create($data); 

        return redirect()->route('login.view'); 
    }
}
