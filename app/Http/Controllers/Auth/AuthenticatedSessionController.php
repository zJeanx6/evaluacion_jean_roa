<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View{ return view('auth.login'); }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only('uid', 'password');
        $user = User::where('uid', $request->uid)->first();

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            
            if ($user->role_id == 1) {
                $request->session()->put('pending_user_id', $user->uid);
                Auth::logout();
                return redirect()->route('conductor.code');
            }

            if ($user->role_id == 2) {
                return redirect()->route('pasajeros.index');
            }

        }
        return back()->withErrors(['uid' => 'Las credenciales no coinciden con nuestros registros.',]);
    }

    public function destroy(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
