<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'messageable_id',
        'messageable_type',
        'task_id',
    ];

    public function messageable(){
        return $this->morphTo();
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }
}
