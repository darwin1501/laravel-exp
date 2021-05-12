<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{$project->title}}
     </h2>
   </x-slot>
   <div class="card project-container">
      <a href="/projects" class="btn btn-back">Go Back</a>
      <br>
      <br>
      <h2 class="project-title">{{$project->title}}</a></h2>
      <br>
      <br>
      <img class="card-img" style="width: 100%" src="/storage/cover_images/{{$project->cover_image}}">
      {{-- included "!!" to parse the html --}}
      <br>
      <br>
      <p>{!! $project->description !!}</p>
      <br>
      <h4 class="project-date">Created at: {{$project->created_at}} by {{$project->user->name}}</h4>
      <br>
      <br>
      @if (Auth::user())
         @if (Auth::user()->id == $project->user_id)
         <a href="/projects/{{$project->id}}/edit" class="btn btn-edit">Edit</a>
         <br>
         <br>
         {!! Form::open(['action' => ['App\Http\Controllers\ProjectsController@destroy',$project->id],'method' => 'POST']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class' => 'btn btn-delete']) }}
         {!! Form::close() !!}
         @endif
      @endif
     </div>
</x-app-layout>