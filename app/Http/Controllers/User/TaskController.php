<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function show(Task $task){
        return view('project.user.show-task',compact('task'));
    }

    public function updateToInProgress(Request $request,Task $task){
        
        DB::transaction(function() use ($request,$task){

            $task->update([
                'status'    => 'in progress',
            ]);

            $user = User::find(auth()->user()->id);

            $user->update([
                'current_task'  => $task->id,
            ]);
            
        });

        return redirect()->route('user.task',$task->id);
    }

    public function updateToCodeReview(Request $request,Task $task){
        $task->update([
            'status'    => 'code review',
        ]);

        return redirect()->route('user.task',$task->id);  
    }
}
