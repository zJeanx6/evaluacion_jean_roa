<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestSoli;
use App\Models\State;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function index()
    {
        $driverId = Auth::user()->uid;
        $requests = RequestSoli::where('driver_id', $driverId)->get();

        return view('driver.index', compact('requests'));
    }

    public function edit($id)
    {
        $requestSoli = RequestSoli::with(['state'])->findOrFail($id);
        $states = State::all();
        return view('driver.edit', compact('requestSoli', 'states'));
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'state' => 'required|exists:states,id',
        ]);

        $requestSoli = RequestSoli::findOrFail($id);
        $requestSoli->state_id = $data['state'];
        $requestSoli->save();

        return redirect()->route('conductores.index');
    }

}
