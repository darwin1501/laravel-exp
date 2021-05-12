{{-- @extends('layout.app')

@section('title')
    <title>About</title>
@endsection

@section('content')
    <p>this is about</p>
@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <p>This is about</p>
</x-app-layout>