<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestSoli;
use App\Models\State;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driverId = auth()->user()->uid; // Obtener el ID del conductor autenticado
        $requests = RequestSoli::with(['passenger', 'NeighborhoodOrigin', 'NeighborhoodDestination', 'state'])
            ->where('driver_id', $driverId)
            ->paginate(10);

        return view('driver.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $requestSoli = RequestSoli::with(['state'])->findOrFail($id);
        $states = State::all(); // Obtener todos los estados disponibles
        return view('driver.edit', compact('requestSoli', 'states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'state' => 'required|exists:states,id',
        ]);

        $requestSoli = RequestSoli::findOrFail($id);
        $requestSoli->state = $data['state'];
        $requestSoli->save();

        return redirect()->route('conductores.index')->with('success', 'Estado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
