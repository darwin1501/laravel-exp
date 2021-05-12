{{-- @extends('layout.app')

@section('content')
         <p>Create Project</p>
         <br>
         {!! Form::open(['action' => 'App\Http\Controllers\ProjectsController@store', 'method' => 'POST']) !!}
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title','', ['placeholder' => 'Title']) }}
            <br>
            {{ Form::label('description', 'Descritpion') }}
            {{ Form::textarea('description','', ['placeholder' => 'Descritpion']) }}
            <br>
            <br>
            {{ Form::submit('Submit', ['class' => 'btn btn-submit']) }}
        {!! Form::close() !!}
@endsection --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Project') }}
        </h2>
    </x-slot>
         {!! Form::open(['action' => 'App\Http\Controllers\ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title','', ['placeholder' => 'Title']) }}
            <br>
            {{ Form::label('description', 'Descritpion') }}
            {{ Form::textarea('description','', ['placeholder' => 'Descritpion']) }}
            <br>
            <br>
            {{ Form::file('cover_image')}}
            <br>
            <br>
            {{ Form::submit('Submit', ['class' => 'btn btn-submit']) }}
        {!! Form::close() !!}
</x-app-layout>