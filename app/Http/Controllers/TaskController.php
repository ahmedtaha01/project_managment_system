<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\Task;
use App\Models\Chat;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')->select('id','name')->get();
        $users = DB::table('users')->select('id','name')->get();
        $data = [
            'projects' => $projects,
            'users'    => $users, 
        ];
        return view('project.add-task',[ 'data' => $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'deadline'      => 'required',
            'project'       => 'required',
            'user'          => 'required',
        ]);

        Task::create([
            'name'          => $request->input('name'),
            'description'   => $request->input('description'),
            'deadline'      => $request->input('deadline'),
            't_created_at'  => date('Y-m-d H-i'),
            'project_id'    => $request->input('project'),
            'user_id'       => $request->input('user'),
        ]);

        return redirect('/task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $task = Task::findOrFail($id);
        $data = [
            'task' => $task,
        ];
        if(auth()->user()->is_admin == '1'){
            return view('project.task',['data' => $data]);
        }

        return view('project.front-pages.show-task',['data' => $data]);
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
        if(empty($request->File)){
            Task::where('id','=',$id)->update([
                'phase'         => '1',
            ]);
            User::where('id','=',auth()->user()->id)->update([
                'current_task'         => $id,
            ]);

            return redirect('task/'.Crypt::encrypt($id))->with('success','You have started this task');
        } else {
            $request->validate([
                'File' => 'required|max:1024',
            ]);
            $ext = pathinfo($request->File->getClientOriginalName(), PATHINFO_EXTENSION); // to get any extension
            
            $fileName = 'file-'.time().'-task'.$id.'.'.$ext;
            
            Task::where('id','=',$id)->update([
                'attachment'    => $fileName,
                'phase'         => '2',
            ]);

            $numOfTasks = DB::table('users')->select('number_of_tasks')->where('id','=',auth()->user()->id)->first();
            $numOfTasks = $numOfTasks->number_of_tasks +1;
            User::where('id','=',auth()->user()->id)->update([
                'number_of_tasks'   => $numOfTasks,
                'current_task'      => null,
            ]);
    
            $request->File->move(public_path('attachments'),$fileName);   
            
            return redirect('task/'.Crypt::encrypt($id))->with('success','File uploaded successfuly');
        }
        
        
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
