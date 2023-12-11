<?php

namespace App\View\Components\Project;

use Illuminate\View\Component;

class TaskStatus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public String $status;
    public function __construct(String $status)
    {
        $this->status = $status; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.project.task-status');
    }
}
