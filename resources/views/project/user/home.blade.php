@extends('project.layouts.user-layout')

@section('user-content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 text-center offset-sm-2">
            <h1 class="heading">
                Tasks needed to be finished soon
            </h1>
            <div class="row">
                @forelse ($tasks as $task)
                    <div class="col-md-4 col-sm-12 ">
                        <a href="{{ route('user.task',$task->id) }}" class="text-dark">
                            <div class="task-data fw-bold" style="background-color: white">
                                <div class="task-name text-center">
                                    {{ $task->name }}
                                </div>
                                <div class="task-user">
                                    <img src="{{ $task->user->image == null ? asset('images/profile/profile.png'): asset('images/profile/'.$task->user->image->path) }}" width="50" height="40" style="border-radius: 50%;">
                                    <span>{{ $task->user->name }}</span> 
                                    <span class="card-subtitle text-muted e-mail">{{ $task->user->email }}</span>
                                </div>
                                <div class="task-created">
                                    created at : <span class="text-success">{{ $task->created_at }}</span> 
                                </div>
                                <div class="task-deadline">
                                    deadline : <span class="text-danger">{{ $task->deadline }}</span> 
                                </div>
                                <div class="text-center phase mb-4">
                                    <x-project.task-status :status="$task->status" />
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    No Tasks
                @endforelse 
            </div>  
        </div>
                
    </div>
</div>

@endsection