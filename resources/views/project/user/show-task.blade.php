@extends('project.layouts.user-layout')

@section('user-content')
<div class='container'>
    <div row='row'>
        <div class="col-sm-9 col-md-10 offset-sm-3 offset-md-2">
            <div>
                <h1 class="text-center mt-3">
                    {{ $task->project->name }}
                </h1>
                <hr>
                <h2>
                    {{ $task->name }}
                </h2>
                @if ($task->status == 'to do')
                    <form action="{{ route('user.task-to-inprogress',$task->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input class="form-control btn btn-primary" type="submit" name="submit" value="Start Task">
                    </form>    
                @endif
                @if ($task->status == 'in progress')
                    <form action="{{ route('user.task',$task->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input class="form-control btn btn-primary" type="submit" name="submit" value="done">
                    </form> 
                @endif
                
                <hr>
                <div class="task-user">
                    <img src="{{ $task->user->image == null ? asset('images/profile/profile.png'): asset('images/profile/'.$task->user->image->path) }}" alt="" width="50" height="40" style="border-radius: 50%;">
                    <span>{{ $task->user->name }}</span> 
                    <span class="card-subtitle text-muted e-mail">{{ $task->user->email }}</span>
                </div>
                <hr>
                <p>
                    {{ $task->description }}
                </p>
                <div class="task-created mb-4">
                    created at : <span class="text-success">{{ $task->created_at }}</span> 
                </div>
                <div class="task-deadline mt-4 mb-4">
                    deadline : <span class="text-danger">{{ $task->deadline }}</span> 
                </div>
                
                <div class="text-center phase mb-3">
                    <x-project.task-status :status="$task->status" />
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                            <form action="{{ route('message.store') }}" method="post">
                                @csrf
                                <div class="card-body p-4">
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" placeholder="Type comment..." name='content'/>
                                        <input type="hidden" value='{{ $task->id }}' name="task_id">
                                        <div class="mt-3">
                                            <input type="submit" value="send" class="form-control btn btn-primary">
                                        </div>
                                    </div>
                                    @forelse ($task->messages as $message)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <img src="{{ ($message->messageable->image ==null)? asset('images/profile/profile.png') : '/images/profile/'.$message->messageable->image->path }}" alt="avatar" width="25"
                                                    height="25" />
                                                    <p class="small mb-0 ms-2">{{ $message->messageable->name }}</p><br>
                                                </div>
                                            </div>
                                            <p>{{ $message->content }}</p>
                                            <span class="text-muted">{{ $message->created_at }}</span>
                                        </div>
                                    </div>
                                    @empty
                                        <div class="alert alert-warning text-center m-4">
                                            No Comments
                                        </div>
                                    @endforelse
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>                 
    </div>    
</div>
@endsection