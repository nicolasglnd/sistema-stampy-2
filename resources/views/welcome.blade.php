@extends('layouts.app')

@section('titulo', 'Pagina Principal')

@section('contenido')

    <div
    class="hero min-h-screen"
    style="background-image: url('/images/fondo-stampy.png')">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-neutral-content text-center">
        <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">Sistema Stampy S.A.S.</h1>
        <button class="btn btn-primary">Get Started</button>
        </div>
    </div>
    </div>

@endsection