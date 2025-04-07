@extends('layouts.app')
@section('title', 'Inicio Conductor')
@section('navigation')
    @include('layouts.navigation-driver')
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Revisa que viajes tienes por hacer</h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                            <thead class="text border-b border-gray-200 text-gray-700 uppercase bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">ID</th>
                                                    <th scope="col" class="px-6 py-3">FECHA</th>
                                                    <th scope="col" class="px-6 py-3">PASAJERO</th>
                                                    <th scope="col" class="px-6 py-3">ORIGEN</th>
                                                    <th scope="col" class="px-6 py-3">DESTINO</th>
                                                    <th scope="col" class="px-6 py-3">ESTADO</th>
                                                    <th scope="col" class="px-6 py-3">ACCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($requests as $request)
                                                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                                        <th scope="row"
                                                            class="px-6 py-4 text-center">
                                                            {{ $request->id }}
                                                        </th>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $request->date }}
                                                        </td>
                                                        <td class="px-10 py-4 text-center">
                                                            {{ $request->passenger->name }}
                                                        </td>
                                                        <td class="px-10 py-4 text-center">
                                                            {{ $request->NeighborhoodOrigin->name }}
                                                        </td>
                                                        <td class="px-10 py-4 text-center">
                                                            {{ $request->NeighborhoodDestination->name }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            {{ $request->State->name }}
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            <a href="{{ route('driver.edit', $request->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="mx-4 mt-4 mb-4">{{ $requests->links() }}</div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
