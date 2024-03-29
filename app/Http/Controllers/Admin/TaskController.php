<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\Admin\Task\CreateTaskRequest;
use App\Models\Project;
use App\Models\Task;

use App\Models\User;

class TaskController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        
    }

    public function indexTypes($type){
        $projects = Project::where('admin_id',auth()->user()->id)->pluck('id');
        $tasks = Task::whereIn('project_id',$projects)->where('status',$type)->get();
        $data = [
            'tasks' => $tasks,
            'name'  => $type
        ];
        return view('project.admin.task.types-tasks',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = DB::table('projects')->where('admin_id',auth()->user()->id)->select('id','name')->get();
        $users = DB::table('users')->where('admin_id',auth()->user()->id)->select('id','name')->get();
        $data = [
            'projects' => $projects,
            'users'    => $users, 
        ];
        return view('project.admin.task.add-task',[ 'data' => $data ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
        DB::transaction(function () use($request){
            Task::create([
                'name'          => $request->name,
                'description'   => $request->description,
                'deadline'      => $request->deadline,
                'created_at'    => date('Y-m-d H-i'),
                'project_id'    => $request->project_id,
                'user_id'       => $request->user_id,
                'status'        => 'to do',
                'priority'      => $request->priority,
            ]);

            $project = Project::find($request->project_id);
            $project->number_of_tasks = $project->number_of_tasks + 1;
            $project->save();
        });
        
        return redirect()->route('projects.show',$request->project_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('project.admin.task.task',compact('task'));        
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
    public function update(Request $request, Task $task)
    {
        DB::transaction(function() use($request,$task){
            $task->update([
                'status'    => 'done',
            ]);

            $user = User::find($request->user_id);

            $user->update([
                'number_of_tasks'   => $user->number_of_tasks + 1,
                'current_task'      => null, 
            ]);
        });
       
        return redirect()->route('tasks.show',$task->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
