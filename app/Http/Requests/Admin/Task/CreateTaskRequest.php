<?php

namespace App\Http\Requests\Admin\Task;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $projects = Project::where('admin_id',auth()->user()->id)->pluck('id')->toArray();
        return auth()->guard('admin')->check() && in_array($this->project_id,$projects);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|min:3|max:50',
            'description'   => 'required',
            'deadline'      => 'required',
            'project_id'    => 'required|exists:projects,id',
            'user_id'       => 'required|exists:users,id',
            'priority'      => 'required|between:1,9'
        ];
    }
}
