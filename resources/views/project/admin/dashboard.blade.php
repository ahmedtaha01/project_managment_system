@extends('project.layouts.admin-layout')
@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 offset-sm-2 main">
                <div>
                    <div class="mt-4 mb-4">
                        <img src="{{ (auth()->user()->image == null)? asset('images/profile/profile.png'):asset('images/profile/'.auth()->user()->image->path)  }}" alt="avatar" width="45"height="45" style="border-radius: 50%" />
                        <span class="span-posi1">
                            <span class="phrase-hello">Hello,</span> <span class="phrase-name">{{ auth()->user()->name }}</span>
                        </span>
                        <span class="span-posi2">check the company activities</span> 
                    </div>
                    
                </div>
                <div class='row'>
                    <div class="col-lg-3">
                        <a href="{{ route('projects.index') }}">
                            <div class="box-data shadow-lg">
                                <div class="icon-div">
                                    <i class="fa fa-project-diagram"></i> 
                                </div>
                                <div class="box-data-word">
                                    Projects
                                </div>
                                <div class="box-data-number">
                                    {{ $data['number_of_projects'] }}
                                </div>    
                            </div>
                        </a>  
                    </div>
                    <div class="col-lg-3">
                        <a href="{{ route('tasks.types','to do') }}">
                            <div class="box-data shadow-lg">
                                <div class="icon-div">
                                    <i class="fa-solid fa-circle-pause icon"></i>
                                </div>
                                <div class="box-data-word">
                                    To do Tasks
                                </div>
                                <div class="box-data-number">
                                    {{ $data['number_of_tasks_to_do'] }}
                                </div>    
                            </div>        
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{ route('tasks.types','in progress') }}">
                            <div class="box-data shadow-lg">
                                <div class="icon-div">
                                    <i class="fa-solid fa-spinner icon"></i> 
                                </div>
                                <div class="box-data-word">
                                    Tasks in progress
                                </div>
                                <div class="box-data-number">
                                    {{ $data['number_of_tasks_in_progress'] }}
                                </div>    
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3">
                        <a href="{{ route('tasks.types','code review') }}">
                            <div class="box-data shadow-lg">
                                <div class="icon-div">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <div class="box-data-word">
                                    Tasks in code review
                                </div>
                                <div class="box-data-number">
                                    {{ $data['number_of_tasks_code_review'] }}
                                </div>    
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3">
                        <a href="{{ route('tasks.types','done') }}">
                            <div class="box-data shadow-lg">
                                <div class="icon-div">
                                    <i class="fa-solid fa-list-check icon"></i>
                                </div>
                                <div class="box-data-word">
                                    Tasks Completed
                                </div>
                                <div class="box-data-number">
                                    {{ $data['number_of_tasks_completed'] }}
                                </div>    
                            </div>
                        </a>
                    </div>
                    
                    
                    <div class="col-lg-3">
                        <a href="{{ route('users.index') }}">
                            <div class="box-data shadow-lg">
                                <div class="icon-div">
                                    <i class="fa-solid fa-users icon"></i> 
                                </div>
                                <div class="box-data-word">
                                    Users
                                </div>
                                <div class="box-data-number">
                                    {{ $data['number_of_users'] }}
                                </div>    
                            </div>
                        </a>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shadow-lg" style="background-color: white;border-radius:5px">
                            <h3 class="heading-dashboard text-center p-3">
                                Projects
                            </h3>
                            <table class="table">
                                @forelse ($data['projects'] as $project)
                                    <tr>
                                        <td class="p-3">
                                            {{ $project->name }}
                                        </td>
                                        <td class="p-3">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="background: linear-gradient(90deg, #0f123f 0%, #292c4d 69%, #37373f 100%); width: {{ ($project->completed_tasks /($project->number_of_tasks == 0 ? 1 : $project->number_of_tasks ) )*100 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>    
                                @empty
                                <div class="alert alert-warning text-center m-3">
                                    No Projects
                                </div>
                                    
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



