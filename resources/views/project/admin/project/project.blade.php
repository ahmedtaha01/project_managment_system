@extends('project.layouts.admin-layout')

@section('admin-content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2">
            <div class="text-center">
                <h1 class="heading">
                    {{ $data['project']->name }}
                </h1>
            </div>
            @if ( ($data['project']->completed_tasks /($data['project']->number_of_tasks == 0 ? 1 : $data['project']->number_of_tasks ) )*100 != 100)
            <div class="mb-4">
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($data['project']->completed_tasks /($data['project']->number_of_tasks == 0 ? 1 : $data['project']->number_of_tasks ) )*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            @else  
            <div class=" mb-4 text-center text-white p-3 fs-4 fw-bolder bg-success-me">
                Completed
            </div>  
            @endif
            
            
           
            <div class="row">
                @forelse ($data['tasks'] as $task)
                <div class="col-md-4 col-sm-12">
                    <a href="{{ route('tasks.show',$task->id) }}" class="text-dark">
                        <div class="task-data fw-bold" style="background-color: white">
                            <div class="task-name text-center">
                                {{ $task->name }}
                            </div>
                            <div class="task-user">
                                <img src="{{ $task->user->image == null ? asset('images/profile/profile.png'): asset('images/profile/'.$task->user->image->path) }}" width="50" height="40" style="border-radius: 50%;">
                                <span>{{ $task['user']->name }}</span>
                                
                                <span class=" text-muted e-mail">{{ $task['user']->email }}</span>
                            </div>
                            <div class="task-created">
                                created at : <span class="text-success">{{ $task->created_at }}</span> 
                            </div>
                            <div class="task-deadline">
                                deadline : <span class="text-danger">{{ $task->deadline }}</span> 
                            </div>
                            <div class="text-center phase">
                                <x-project.task-status :status="$task->status" />
                            </div>
                            <div class="text-center phase mb-4">
                                <a href="/email/{{ $task->id }}/{{ $task->user->id }}" class="btn btn-primary text-center">
                                    send reminder
                                </a>
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
            
