<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}
     {{-- <p>This is Project</p> --}}
     @if (count($projects) > 0)
        @foreach ($projects as $project)
                <div class="card project-container">
                    <h2 class="project-title">{{$project->title}}</h2>
                    <h4 class="project-date">Created at: {{$project->created_at}}</h4>
                    <br>
                    <br>
                    <a href="/projects/{{$project->id}}/edit" class="btn btn-edit">Edit</a>
                    {!! Form::open(['action' => ['App\Http\Controllers\ProjectsController@destroy',$project->id],'method' => 'POST']) !!}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-delete']) }}
                    {!! Form::close() !!}
                </div>
        @endforeach
        {{-- {{$projects->links()}} --}}
        @else
        <p>No projects to show</p>
    @endif
</x-app-layout>
