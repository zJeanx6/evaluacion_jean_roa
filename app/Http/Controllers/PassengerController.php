<?php

namespace App\Http\Controllers;

use App\Models\Neighborhood;
use App\Models\RequestSoli;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassengerController extends Controller
{
    public function index(){
        $passengerId = Auth::user()->uid;
        $requests = RequestSoli::where('passenger_id', $passengerId)->get();
        $states = State::all();
        $neightboorhoods = Neighborhood::all();
        $drivers = User::where('role_id', 1)->get();
        return view('passenger.index', compact('neightboorhoods', 'drivers', 'states', 'requests'));
    }

    public function create(){
        $neightboorhoods = Neighborhood::all();
        $drivers = User::where('role_id', 1)->get();
        return view('passenger.create', compact('neightboorhoods', 'drivers'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'date' => 'required|date',
            'passenger_id' => 'required|exists:users,uid',
            'driver_id' => 'required|exists:users,uid',
            'origin' => 'required|exists:neighborhoods,id',
            'destination' => 'required|exists:neighborhoods,id',
            'state' => 'required|exists:states,id',
        ]);

        RequestSoli::create([
            'date' => $data['date'],
            'passenger_id' => $data['passenger_id'],
            'driver_id' => $data['driver_id'],
            'origin' => $data['origin'],
            'destination' => $data['destination'],
            'state_id' => $data['state'],
        ]);

        return redirect()->route('pasajeros.index');
    }

    public function show(string $id){
        //
    }

    public function edit(string $id){
        //
    }

    public function update(Request $request){
        //
    }

    public function destroy($id)
    {
        $solipasaje = RequestSoli::findOrFail($id);
        $solipasaje->delete();
    
        return redirect()->route('pasajeros.index');
    }
}