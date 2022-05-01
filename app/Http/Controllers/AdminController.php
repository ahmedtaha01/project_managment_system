<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\Reminder;
use App\Models\Project;
use App\Models\Task;

class AdminController extends Controller
{
    public function dashboard(){
        $numberOfProjects       = DB::table('projects')->count();
        $numberOfTasksCompleted = DB::table('tasks')->where('phase','2')->count();
        $numberOfTasksWaiting   = DB::table('tasks')->where('phase','0')->count();
        $numberOfTasksProcess   = DB::table('tasks')->where('phase','1')->count();
        $numberOfUsers          = DB::table('users')->count();
        $projects               = Project::get();
        $data = [
            'number_of_projects'            => $numberOfProjects,
            'number_of_tasks_completed'     => $numberOfTasksCompleted,
            'number_of_tasks_waiting'       => $numberOfTasksWaiting,
            'number_of_tasks_process'       => $numberOfTasksProcess,
            'number_of_users'               => $numberOfUsers,
            'projects'                      => $projects,
        ];
        return view('project.dashboard',['data' => $data]);
    }

    public function projects(){
        $projects = Project::get();
        $data = [
            'projects' => $projects,
        ];
        return view('project.projects',['data' => $data]);
    }

    public function tasks($id){
        $name = ['Tasks Waitng', 'Tasks in Process','Tasks Acomplished'];
        if(in_array($id,[0,1,2])){
            $tasks = Task::where('phase','=',$id)->get();
            $name = $name[$id];
        } else {
            abort(404);
        }
        $data = [
            'tasks' => $tasks,
            'name'  => $name
        ];

        return view('project.types-tasks',['data' => $data]);
    }

    public function email($id){
        $task = Task::find($id);
        //Mail::to('ahmedmohamedtaha2001@gmail.com')->send(new Reminder($task));
        return new Reminder($task);
    }
}
