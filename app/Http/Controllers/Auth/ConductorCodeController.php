<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConductorCodeController extends Controller
{
    public function create()
    {
        return view('auth.conductor-code');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'integer', 'digits_between:8,11'], 
        ]);

        $userId = $request->session()->get('pending_user_id');
        $user = \App\Models\User::where('uid', $userId)->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['code' => 'Sesión expirada. Por favor, inicie sesión nuevamente.']);
        }

        if ((int) $request->code === (int) $user->uid) { 
            Auth::login($user);
            $request->session()->forget('pending_user_id');
        
            if ($user->role_id == 1) {
                return redirect()->route('conductores.index');
            }
        
            return redirect()->route('dashboard');
        }
        
        return back()->withErrors(['code' => 'El código ingresado es incorrecto.']);
    }
}
