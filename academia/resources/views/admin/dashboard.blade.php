@extends('admin.layouts.layout')

@section('content')
    <h1>Dashboard</h1>
    <p>Usuario autenticado: {{ auth()->user()->name }}</p>
    <p>Correo electrónico: {{ auth()->user()->email }}</p>

    @if (auth()->user()->profesor == false)

        <h2>Solo eres Alumno , no puedes ver nada mas</h2>

    @endif
@endsection