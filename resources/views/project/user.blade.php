@extends('project.layouts.admin-layout')

@section('adminContent')
<div class='container'>
    <div row='row'>
        <div class="col-md-10 offset-md-2 col-sm-9 offset-sm-3">
            <div>
                <h2 class="heading-dashboard" style="margin: 0">User Info</h2>
            </div>
                <div class="form p-3 rounded-3" style="background-color: white">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="user-image" >
                                <img src="{{ ($user['image']==null)? asset('images/profile/profile.png') : '/images/profile/'.$user['image'] }}" style="border-radius: 50%;width: inherit; height: inherit;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2 mb-1" for="">UserName : </label> {{ $user['name'] }} <hr>
                            <label class="mt-2 mb-1" for="">E-mail : </label> {{ $user['email'] }} <hr>
                            <label class="mt-2 mb-1" for="">Position : </label> {{ $user['position'] }} <hr>
                            <label class="mt-2 mb-1" for="">Number Of Tasks : </label> {{ $user['number_of_tasks'] }} <hr>
                            <label class="mt-2 mb-1" for="">Current Task : </label>
                            @if ($user['current_task'] != null)
                                <a href="/task/{{ Crypt::encrypt($user['current_task']) }}"> Click here</a>  <hr>
                            @else
                                <p>No Task Currently</p>                                
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-grid gap-2 m-3">
                                <a href="/user/{{ $user['id'] }}/edit" class="btn btn-outline-primary p-3 fs-5 fw-bold" >
                                    Edit
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="/user/{{ $user['id'] }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="d-grid gap-2 m-3">
                                    <button class="btn btn-outline-danger p-3 fs-5 fw-bold">
                                        Remove
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>    
</div>
@endsection

