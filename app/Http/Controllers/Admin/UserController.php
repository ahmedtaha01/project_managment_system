<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\User\CreateUserRequest;
use App\Http\Requests\Admin\User\EditUserRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('image')->where('admin_id',auth()->user()->id)->get();
        
        return view('project.admin.user.users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.admin.user.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        User::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'position'          => $request->position,
            'password'          => Hash::make($request->password),
            'number_of_tasks'   => 0,
            'current_task'      => NULL,
            'admin_id'          => auth()->user()->id,
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('project.admin.user.user',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('project.admin.user.edit-user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request,User $user)
    {
        //transaction
        DB::transaction(function() use ($request,$user){
        
            $user->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'position'  => $request->position,
            ]);
            if(isset($request->image)){
                // deleting old image
                if($user->image != null){
                    unlink(public_path('images/profile/'.$user->image->path));
                }

                $imageName = time().'-'.$request->name.'.'.$request->image->guessExtension();

                Image::updateOrCreate(['imageable_id'=>$user->id],[
                    'path'          => $imageName,
                    'imageable_id'  => $user->id,
                    'imageable_type'=> 'App\Models\User',
                ]);

                $request->image->move(public_path('images/profile'),$imageName);
            }
        });

        return redirect()->route('users.show',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->image != null){
            Image::where('imageable_id',$user->id)->delete();
            unlink(public_path('images/profile/'.$user->image->path));
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}
