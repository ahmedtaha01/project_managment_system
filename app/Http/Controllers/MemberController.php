<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class MemberController extends Controller
{
    public function home(){
        $tasks = Task::where('user_id','=',auth()->user()->id)->get();
        $data = [
            'tasks' => $tasks,
        ];
        return view('project.user.home',['data' => $data]);
    }
}
