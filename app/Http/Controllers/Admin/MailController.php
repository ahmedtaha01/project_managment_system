<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\User;
use App\Mail\Reminder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index($taskId,$userId){
        $task = Task::find($taskId);
        $email = User::find($userId)->email;
        Mail::to($email)->send(new Reminder($task));
        return new Reminder($task);
    }
}
