<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('project.users',['users' => $users]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = $user->toArray();
        return view('project.user',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('project.edit-user',['user' => $user]);
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
        $request->validate([
            'image'     => 'required|mimes:png,jpg|max:8192',
            'name'      => 'required|max:255',
            'position'  => 'required',
            'email'     => 'required',
        ]);
        $imageName = time().'-'.$request->name.'.'.$request->image->guessExtension();

        $oldImage = User::select('image')->find($id);
        
        User::where('id','=',$id)->update([
            'name'  => $request->name,
            'email'  => $request->email,
            'position'  => $request->position,
            'image'  => $imageName,
        ]);

        if($oldImage->image != null){
            unlink(public_path('images/profile/'.$oldImage));
        }

        $request->image->move(public_path('images/profile'),$imageName);
        return redirect('/user/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user){
            if($user->image != null){
                unlink(public_path('images/profile/'.$oldImage));
            }
            User::destroy($id);
        }
        return redirect('/user');
    }
}
