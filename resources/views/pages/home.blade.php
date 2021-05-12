{{-- old laravel blade syntax --}}

{{-- @extends('layout.app')

@section('title')
    <title>Home</title>
@endsection

@section('content')
    <div class="card login-container">
        <div class="card-title">
            <h2>Welcome to my Laravel Basic Blog</h2>
        </div>
        <div class="btn-grp-container">
            <div class="btn-grp">
                <button class="btn btn-login">
                    <p class="btn-txt">Login</p>
                </button>
                <button class="btn btn-register">
                    <p class="btn-txt">Register</p>
                </button>
            </div>
        </div>
    </div>
@endsection

@extends('layout.app')

@section('title')
    <title>Home</title>
@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="card login-container">
        <div class="card-title">
            <h2>Welcome to my Laravel Basic Blog</h2>
        </div>
        <div class="btn-grp-container">
            <div class="btn-grp">
                <x-nav-link class="btn btn-login" :href="route('login')">
                    <p class="btn-txt">Login</p>
                </x-nav-link>
                <x-nav-link class="btn btn-register" :href="route('register')">
                    <p class="btn-txt">Register</p>
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
    
