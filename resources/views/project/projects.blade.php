@extends('project.layouts.admin-layout')
@section('adminContent')
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
                                <a href="/project/{{ $project->id }}" class="text-white">
                                    <div class="accordion-body hover-body">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="background: linear-gradient(90deg, #0f123f 0%, #292c4d 69%, #37373f 100%);width: {{ ($project->tasks->where('phase','2')->count() / ($project->tasks->count() == 0 ? 1 : $project->tasks->count() ))*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>      
                                        <div class="m-3 text-white">
                                            <span class="bg-warning m-4 p-2 rounded-3">
                                                Number of tasks : {{ $project->tasks->count() }}
                                            </span>  
                                            <span class="bg-success m-4 p-2 rounded-3">
                                                Tasks accomplished : {{ $project->tasks->where('phase','2')->count() }}
                                            </span>
                                            <span class="bg-secondary m-4 p-2 rounded-3">
                                                Tasks in process : {{ $project->tasks->where('phase','1')->count() }}
                                            </span>
                                            <span class="bg-danger m-4 p-2 rounded-3">
                                                Tasks waiting : {{ $project->tasks->where('phase','0')->count() }}
                                            </span>
                                            <form action="/project/{{ $project->id }}" method="post" class="text-center mt-4 p-2">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            No Projects
                        @endforelse
                        
                    </div>    
                </div>
            </div>  
        </div>
    </div>  

@endsection

           
