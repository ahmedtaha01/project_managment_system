<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id','=',auth()->user()->id)->get();
        
        return view('project.user.home',compact('tasks'));
    }
}
