<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\Reminder;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        
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

    public function email($taskId,$userId){
        $task = Task::find($taskId);
        $email = User::find($userId)->email;
        Mail::to($email)->send(new Reminder($task));
        return new Reminder($task);
    }
}
