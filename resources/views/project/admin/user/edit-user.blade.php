@extends('project.layouts.admin-layout')

@section('admin-content')
<div class='container'>
    <div row='row'>
        <div class="col-md-10 offset-md-2 col-sm-9 offset-sm-3">
            <div>
                <h2 class="heading-dashboard" style="margin: 0">User Info</h2>
            </div>
            <form action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="form p-3 rounded-3" style="background-color: white">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="user-image" >
                                <img src="{{ ($user->image == null)? asset('images/profile/profile.png') : '/images/profile/'.$user->image->path }}" style="border-radius: 50%;width: inherit; height: inherit;">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="med">
                                <input type="file" class="form-control" name='image'>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label for="" class="mb-2 fs-5">UserName</label>
                            <input type="text" class="form-control" value='{{ $user->name }}' name="name">
                            <label for="" class="mb-2 fs-5">E-mail</label>
                            <input type="text" class="form-control" value='{{ $user->email }}' name="email">
                            <label for="" class="mb-2 fs-5">Position</label>
                            <input type="text" class="form-control" value='{{ $user->position }}' name="position">
                            <div class="d-grid gap-2 m-3">
                                <input class="btn btn-outline-primary p-3 fs-5 fw-bold" type="submit" value="Update">
                            </div>
                        </div>
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
