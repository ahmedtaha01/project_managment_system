@extends('project.layouts.admin-layout')

@section('adminContent')
    <div class='container'>
        <div row='row'>
            <div class="col-md-10 offset-md-2 col-sm-9 offset-sm-3">
                <div>
                    <h1 class="heading-dashboard" style="margin: 0">Add a new Task</h1>
                </div>
                <form action="/task" method="post">
                    @csrf
                    <div class="form p-3 rounded-3" style="background-color: white">
                        <label class="mb-2 fs-5">Task Name</label>
                        <input class="form-control" type="text" name="name">
                        <label class="mb-2 fs-5">Task Description</label>
                        <textarea class="form-control rounded-3" cols="30" rows="2" name='description'></textarea>
                        <label class="mb-2 fs-5">DeadLine</label>
                        <input class="form-control" type="datetime-local" name='deadline'>
                        <label class="mb-2 fs-5">Project</label>
                        <select class="form-select" name='project'>
                            <option selected>Open this select menu</option>
                            @foreach ($data['projects'] as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>                            
                            @endforeach
                        </select>
                        <label class="mb-2 fs-5">User</label>
                        <select class="form-select" name='user'>
                            <option selected>Open this select menu</option>
                            @foreach ($data['users'] as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                
                            @endforeach
                        </select>
                        <div class="d-grid gap-2 m-3">
                            <input class="btn btn-outline-primary p-3 fs-5 fw-bold" type="submit" value="Create">
                        </div>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="bg-danger mb-2 mt-2 text-center text-white p-3">
                                    {{ $error }}
                                </div>
                            @endforeach
                         @endif
                    </div>
                </form>
            </div>
        </div>    
    </div>
@endsection

