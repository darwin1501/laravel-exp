<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

class ProjectsController extends Controller
{
    //Access Control
    //  prevents the user to access the pages except index, and show
    // on view
    public function __construct()
    {
        return $this->middleware(['auth'], 
        ['except'=>['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects =  Project::orderBy('created_at', 'desc')
                              ->paginate(10);                          
        return view('projects.index',[
                'projects'=>$projects 
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle file uploads
        if ($request->hasFile('cover_image')){
            //get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename only
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get file extension only
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            //it will automatically create cover_images folder at storage/public
            //run php artisan storage:link (to link the storage at public folder)
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'no_image.jpg';
        }

        //store to database
        $project = new Project;
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->user_id = auth()->user()->id;
        $project->cover_image = $fileNameToStore;
        $project->save();

        return redirect('/projects')->with('success', 'Projects Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        
        return view('projects.show',[
                    'project' => $project
                    ]);
        // return view('projects.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        //Access Control
        //prevents someone to edit the projects
        if (auth()->user()->id !== $project->user_id){
            return redirect('/projects')->with(['error' => 'Unauthorized page']);
        }
        
        return view('projects.edit',[
                    'project' => $project
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
                'title' => 'required',
                'description' => 'required'
            ]);
        
            //handle file uploads
        if ($request->hasFile('cover_image')){
            //get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename only
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get file extension only
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        //update data
        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        if ($request->hasFile('cover_image')){
            $project->cover_image = $fileNameToStore;
        }
        $project->save();

        return redirect('/projects')->with('success', 'Projects Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        //Access Control
        //prevents someone to delete the projects
        if (auth()->user()->id !== $project->user_id){
            return redirect('/projects')->with(['error' => 'Unauthorized page']);
        }
        if($project->cover_image != 'no_image.jpg'){
            Storage::delete('/public/cover_images/'.$project->cover_image);
        }
        $project->delete();

        return redirect('/projects')->with('success', 'Project Removed');
    }
}
