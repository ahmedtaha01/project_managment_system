<?php

namespace App\Http\Requests\Admin\Message;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;

class CreateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $projects = Project::where('admin_id',auth()->user()->id)->pluck('id')->toArray();
        $task = Task::find($this->task_id);
        return auth()->guard('admin')->check() && in_array($task->project_id,$projects);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required',
        ];
    }
}
