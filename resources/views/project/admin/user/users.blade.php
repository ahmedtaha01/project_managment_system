@extends('project.layouts.admin-layout')

@section('admin-content')
<div class='container'>
    <div row='row'>
        <div class="col-md-10 offset-md-2 col-sm-9 offset-sm-3">
            <div>
                <h2 class="heading-dashboard" style="margin: 0">Users</h2>
            </div>
            <div class="row">
                @forelse ($users as $user)
                    <div class="col-lg-4">
                        <div class="card mb-3 shadow-lg" style="width: 18rem;">
                            <a href="{{ route('users.show',$user->id) }}">
                                <img src="{{ ($user->image==null)? asset('images/profile/profile.png') : '/images/profile/'.$user->image->path }}" class="card-img-top image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $user->position }}</h6>
                                <h6 class="card-subtitle mb-2 ">{{ $user->email }}</h6>
                            </div>
                        </div>
                    </div>    
                @empty
                <div class="alert alert-warning text-center m-4">
                    No Users
                </div>
                @endforelse
            </div>
        </div>
    </div>    
</div>
@endsection
    
