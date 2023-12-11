@extends('project.layouts.admin-layout')

@section('admin-content')
    <div class='container'>
        <div row='row'>
            <div class="col-md-10 offset-md-2 col-sm-9 offset-sm-3">
                <div>
                    <h1 class="heading-dashboard text-center" style="margin: 0">Add a new User</h1>
                </div>
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="form p-3 rounded-3 shadow-lg" style="background-color: white">
                        <label class="mb-2 fs-5">Name</label>
                        <input class="form-control" type="text" name="name">
                        @error('name')
                        <div class="alert alert-danger text-center m-2">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="mb-2 fs-5">Email</label>
                        <input class="form-control" type="text" name='email'>
                        @error('email')
                        <div class="alert alert-danger text-center m-2">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="mb-2 fs-5">Position</label>
                        <input class="form-control" type="text" name='position'>
                        @error('position')
                        <div class="alert alert-danger text-center m-2">
                            {{ $message }}
                        </div>
                        @enderror
                        <label class="mb-2 fs-5">Password</label>
                        <input class="form-control" type="text" name='password'>
                        @error('password')
                        <div class="alert alert-danger text-center m-2">
                            {{ $message }}
                        </div>
                        @enderror
                        
                        <div class="d-grid gap-2 m-3">
                            <input class="btn btn-outline-primary p-3 fs-5 fw-bold" type="submit" value="Create">
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>    
    </div>
@endsection

