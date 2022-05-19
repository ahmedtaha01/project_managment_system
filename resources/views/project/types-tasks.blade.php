@extends('project.layouts.admin-layout')

@section('adminContent')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-2">
            <div>
                <h2 class="heading-dashboard" style="margin: 0">{{ $data['name'] }}</h2> 
            </div>
            <div class="row">
                @forelse ($data['tasks'] as $task)
                    <div class="col-md-4 col-sm-12">
                        <a href="/task/{{ Crypt::encrypt($task->id) }}" class="text-dark">
                            <div class="task-data fw-bold shadow-lg" style="background-color: white">
                                <div class="text-center">
                                    {{ $task->project->name }}
                                </div>
                                <hr>
                                <div class="task-name text-center">
                                    {{ $task->name }}
                                </div>
                                <div class="task-user">
                                    <img src="{{ $task->user->image == null ? asset('images/profile/profile.png'):asset('images/profile/'.$task->user->image) }}" alt="" width="50" height="40" style="border-radius: 50%;">
                                    <span>{{ $task->user->name }}</span> 
                                    <span class="card-subtitle text-muted e-mail">{{ $task->user->email }}</span>
                                </div>
                                <div class="task-created">
                                    created at : <span class="text-success">{{ $task->t_created_at }}</span> 
                                </div>
                                <div class="task-deadline">
                                    deadline : <span class="text-danger">{{ $task->deadline }}</span> 
                                </div>
                                <div class="text-center phase">
                                    @if ($task->phase == '0')
                                        <span class="text-white bg-warning p-2 rounded m-2">
                                            Waiting
                                        </span> 
                                    @elseif ($task->phase == '1')
                                        <span class="text-white bg-secondary p-2 rounded m-2"> 
                                            Processing
                                        </span>
                                    @else
                                        <span class="text-success bg-white p-2 rounded m-2">
                                            Completed
                                        </span> 
                                    @endif
                                </div>
                                <div class="text-center phase mb-4">
                                    <a href="/email/{{ $task->id }}" class="btn btn-primary text-center">
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
            
