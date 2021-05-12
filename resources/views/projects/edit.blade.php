<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$project->title}}
        </h2>
    </x-slot>
    <p>Create Project</p>
         <br>
         {!! Form::open(['action' => ['App\Http\Controllers\ProjectsController@update', $project->id] , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $project->title, ['placeholder' => 'Title']) }}
            <br>
            {{ Form::label('description', 'Descritpion') }}
            {{ Form::textarea('description', $project->description, ['placeholder' => 'Descritpion']) }}
            <br>
            <br>
            {{ Form::file('cover_image')}}
            <br>
            <br>
            {{-- spoof request of PUT --}}
            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Submit', ['class' => 'btn btn-submit']) }}
        {!! Form::close() !!}
</x-app-layout>