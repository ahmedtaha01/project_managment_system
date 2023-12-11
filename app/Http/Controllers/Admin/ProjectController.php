<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\Admin\Project\CreateProjectRequest;
use Illuminate\Database\Eloquent\Builder;

class ProjectController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $projects = Project::with('tasks')
        //                     ->where('admin_id',auth()->guard('admin')->user()->id)
        //                     ->get();
        $projects = Project::where('admin_id',auth()->guard('admin')->user()->id)
                            ->withCount(['tasks as to_do_count' => function(Builder $query){
                                $query->where('status','to do');
                            },'tasks as in_progress_count'  => function(Builder $query){
                                $query->where('status','in progress');
                            },'tasks as code_review_count'  => function(Builder $query){
                                $query->where('status','code review');
                            }, 'tasks as done_count' => function(Builder $query){
                                $query->where('status','done');
                            }]    
                            )->get();
        
        $data = [
            'projects' => $projects,
        ];
        return view('project.admin.project.projects',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.admin.project.add-project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        Project::create([
            'name'              => $request->input('name'),
            'description'       => $request->input('description'),
            'number_of_tasks'   => 0,
            'completed_tasks'   => 0,
            'status'            => 'open',
            'admin_id'          => auth()->guard('admin')->user()->id,
        ]);

        return redirect()->route('projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $tasks = Task::where('project_id',$project->id)->with('user.image')->get();
        $data = [
            'project' => $project,
            'tasks'   => $tasks  
        ];
        
        return view('project.admin.project.project',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        
        Project::findOrFail($project->id);
        $project->delete();

        return redirect('/projects');
    }
}
