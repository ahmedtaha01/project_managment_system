@extends('project.layouts.front-layout')

@section('frontContent')
<div class='container'>
    <div row='row'>
        <div class="col-sm-9 col-md-10 offset-sm-3 offset-md-2">
            <div>
                <h1 class="text-center mt-3">
                    {{ $data['task']->project->name }}
                </h1>
                <hr>
                <h2>
                    {{ $data['task']->name }}
                </h2>
                @if ($data['task']->phase == '0')
                    <form action="/task/{{ $data['task']->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <input class="form-control btn btn-primary" type="submit" name="submit" value="Start Task">
                    </form>    
                @endif
                
                <hr>
                <div class="task-user">
                    <img src="{{ $data['task']->user->image == null ? asset('images/profile/profile.png'): asset('images/profile/'.$data['task']->user->image) }}" alt="" width="50" height="40" style="border-radius: 50%;">
                    <span>{{ $data['task']->user->name }}</span> 
                    <span class="card-subtitle text-muted e-mail">{{ $data['task']->user->email }}</span>
                </div>
                <hr>
                <p>
                    {{ $data['task']->description }}
                </p>
                <div class="task-created mb-4">
                    created at : <span class="text-success">{{ $data['task']->t_created_at }}</span> 
                </div>
                <div class="task-deadline mt-4 mb-4">
                    deadline : <span class="text-danger">{{ $data['task']->deadline }}</span> 
                </div>
                <div class="mt-4 mb-4">
                    @if ($data['task']->attachment == null && $data['task']->phase == '1')
                        <form class="form-control" action="/task/{{ $data['task']->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input class="form-control" type="file" name="File">
                            <input class="form-control btn btn-outline-primary mt-2" name='submit' type="submit" value="Upload">
                            
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="bg-danger text-white text-center p-3 m-3">
                                        {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                @if($message = Session::get('success'))
                                <div class="bg-success text-white text-center p-3 m-3">
                                    <p>{{$message}}</p>
                                </div>
                                @endif
                        </form>

                    @elseif ($data['task']->attachment != null)
                        <div class="bg-success text-white text-center p-3 m-3">
                            File has been uploaded successfuly
                        </div>
                    @endif
                    
                    
                </div>
                <div class="text-center phase mb-3">
                    @if ($data['task']->phase == '0')
                    <span class="text-white bg-warning p-2 rounded m-2">
                        Waiting
                    </span> 
                    @elseif ($data['task']->phase == '1')
                        <span class="text-white bg-secondary p-2 rounded m-2"> 
                            Processing
                        </span>
                    @else
                        <span class="text-success bg-white p-2 rounded m-2">
                            Completed
                        </span> 
                    @endif
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                            <form action="/chat" method="post">
                                @csrf
                                <div class="card-body p-4">
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" placeholder="Type comment..." name='content'/>
                                        <input type="hidden" value='{{ $data['task']->id }}' name="taskId">
                                        <div class="mt-3">
                                            <input type="submit" value="send" class="form-control btn btn-primary">
                                        </div>
                                    </div>
                                    @forelse ($data['task']->chat as $chat)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                    <img src="{{ asset('images/profile/profile.png') }}" alt="avatar" width="25"
                                                    height="25" />
                                                    <p class="small mb-0 ms-2">{{ $chat->user->name }}</p><br>
                                                </div>
                                            </div>
                                            <p>{{ $chat->content }}</p>
                                        </div>
                                    </div>
                                    @empty
                                        No comments
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