@extends('layouts.app')
@section('title', 'Editar Estado')
@section('navigation')
    @include('layouts.navigation-driver')
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Estado de la Solicitud</h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('driver.update', $requestSoli->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                            <select id="state" name="state" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ $requestSoli->state_id == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex justify-end">
                            <button class="btn-negro" type="submit">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
