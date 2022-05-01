@extends('project.layouts.admin-layout')

@section('adminContent')
<div class='container'>
    <div row='row'>
        <div class="col-md-10 offset-md-2 col-sm-9 offset-sm-3">
            <div>
                <h2 class="heading-dashboard" style="margin: 0">Add new Project</h2>
            </div>
            <form action="/project" method="post">
                @csrf
                <div class="form p-3 rounded-3" style="background-color: white">
                    <label class="mb-2 fs-5">Project Name</label>
                    <input class="form-control" type="text" name="name">
                    <label class="mb-2 fs-5">Project Description</label>
                    <textarea class="form-control rounded-3" cols="30" rows="6" name='description'></textarea>
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

