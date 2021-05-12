
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>
     {{-- <p>This is Project</p> --}}
     @if (count($projects) > 0)
     @foreach ($projects as $project)
         <a href="/projects/{{$project->id}}">
             <div class="card project-container">
                 <div class="card-content">
                     <div class="card-img-container">
                        <img class="card-img project-thumbnail" src="/storage/cover_images/{{$project->cover_image}}">
                     </div>
                     <div class="card-txt-container">
                        <h2 class="project-title">{{$project->title}}</h2>
                        {{-- included "!!" to parse the html --}}
                        <p>{!! $project->description !!}</p>
                        <br>
                        <h4 class="project-date">
                            Created at: {{$project->created_at}} by {{$project->user->name}}
                        </h4>
                    </div>
                </div>
             </div>
         </a>
         <br>
         <br>
     @endforeach
     {{$projects->links()}}
 @else
     <p>No projects to show</p>
 @endif
</x-app-layout>