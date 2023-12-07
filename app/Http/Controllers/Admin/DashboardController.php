<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Support\Facades\DB;


class DashboardController 
{
    public function dashboard(){

        
        $number_of_projects         = DB::table('projects')->where('admin_id',auth()->user()->id)->count();
        
        $projects_added_by_admin    = Project::where('admin_id',auth()->user()->id)->pluck('id');

        $number_of_tasks_to_do      = DB::table('tasks')
                                    ->whereIn('project_id',$projects_added_by_admin)
                                    ->where('status','to do')->count();

        $number_of_tasks_in_progress= DB::table('tasks')
                                    ->whereIn('project_id',$projects_added_by_admin)
                                    ->where('status','in progress')->count();
        
        $number_of_tasks_code_review= DB::table('tasks')
                                    ->whereIn('project_id',$projects_added_by_admin)
                                    ->where('status','code review')->count();

        $number_of_tasks_completed  = DB::table('tasks')
                                    ->whereIn('project_id',$projects_added_by_admin)
                                    ->where('status','done')->count();
        $number_of_users            = DB::table('users')
                                    ->where('admin_id',auth()->user()->id)->count();
        $projects               = Project::get();

        $data = [
            'number_of_projects'            => $number_of_projects,
            'number_of_tasks_completed'     => $number_of_tasks_completed,
            'number_of_tasks_to_do'         => $number_of_tasks_to_do,
            'number_of_tasks_in_progress'   => $number_of_tasks_in_progress,
            'number_of_tasks_code_review'   => $number_of_tasks_code_review,
            'number_of_users'               => $number_of_users,
            'projects'                      => $projects,
        ];
        return view('project.admin.dashboard')->with('data',$data);
    }
}
