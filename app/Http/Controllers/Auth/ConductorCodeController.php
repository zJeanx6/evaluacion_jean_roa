<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConductorCodeController extends Controller
{
    public function create(){ return view('auth.conductor-code');}

    public function store(Request $request){
        $request->validate(['code' => 'required|integer|digits_between:8,11']);
        $userId = $request->session()->get('pending_user_id');
        $user = User::where('uid', $userId)->first();

        if (!$user) {return redirect()->route('login.view');}

        if ((int) $request->code === (int) $user->uid) { 
            Auth::login($user);
            return redirect()->route('conductores.index');
        }   
        return back()->withErrors(['code' => 'El código ingresado es incorrecto.']);
    }
}
