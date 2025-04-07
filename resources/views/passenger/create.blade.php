@extends('layouts.app')
@section('title', 'Inicio Pasajero')
@section('navigation')
    @include('layouts.navigation-passenger')
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Empieza a solicitar tus viajes</h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pasajeros.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Fecha y Hora</label>
                            <input type="datetime-local" id="date" name="date" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="mb-4">
                            <label for="origin" class="block text-sm font-medium text-gray-700">Origen</label>
                            <select id="origin" name="origin" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach ($neightboorhoods as $neighborhood)
                                    <option value="{{ $neighborhood->id }}">{{ $neighborhood->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="destination" class="block text-sm font-medium text-gray-700">Destino</label>
                            <select id="destination" name="destination" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach ($neightboorhoods as $neighborhood)
                                    <option value="{{ $neighborhood->id }}">{{ $neighborhood->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="driver_id" class="block text-sm font-medium text-gray-700">Conductor</label>
                            <select id="driver_id" name="driver_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->uid }}">
                                       Nombres: {{ strtoupper($driver->name . ' ' . $driver->last_name) }}, Identificación: {{ $driver->uid }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="passenger_id" value="{{ auth()->user()->uid }}">
                        <input type="hidden" name="state" value="1">
                        <div class="flex justify-end">
                            <button class="btn-negro" type="submit">Enviar formulario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
