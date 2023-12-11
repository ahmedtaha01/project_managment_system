@extends('project.layouts.admin-layout')
@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
                <div>
                    <h1>Projects</h1>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @forelse ($data['projects'] as $project)
                            <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $project->id }}" style="background-color: white">
                                {{ $project->name }}
                            </div>
                            <div id="collapse-{{ $project->id }}" class="accordion-collapse collapse" >
                                <a href="{{ route('projects.show',$project->id) }}" class="text-white">
                                    <div class="accordion-body hover-body">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="background: linear-gradient(90deg, #0f123f 0%, #292c4d 69%, #37373f 100%);width: {{ ($project->done_count / ($project->number_of_tasks == 0 ? 1 : $project->number_of_tasks ))*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>      
                                        <div class="m-1 text-white container">
                                            <div class="row d-flex justify-content-center">
                                                <span class="bg-primary m-4 p-2 rounded-3 text-center w-75">
                                                    Number of tasks : {{ $project->number_of_tasks }}
                                                </span>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-center">
                                                    <span class="bg-danger m-4 p-2 rounded-3">
                                                        Tasks to do : {{ $project->to_do_count }}
                                                    </span>
                                                </div>
                                                <div class="col d-flex justify-content-center">
                                                    <span class="bg-dark m-4 p-2 rounded-3">
                                                        Tasks in progress : {{ $project->in_progress_count }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-center">
                                                    <span class="bg-warning m-4 p-2 rounded-3">
                                                        Tasks in code review : {{ $project->code_review_count }}
                                                    </span>
                                                </div>
                                                <div class="col d-flex justify-content-center">
                                                    <span class="bg-success m-4 p-2 rounded-3">
                                                        Tasks done : {{ $project->done_count }}
                                                    </span>
                                                </div>
                                            </div>    
                                            
                                            
                                            <form action="{{ route('projects.destroy',$project->id) }}" method="post" class="text-center mt-4 p-2">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                        <div class="alert alert-warning text-center m-4">
                            No Projects
                        </div>
                        @endforelse
                        
                    </div>    
                </div>
            </div>  
        </div>
    </div>  

@endsection

           
