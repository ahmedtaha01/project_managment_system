<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'number_of_tasks',
        'completed_tasks',
        'status',
        'admin_id',
    ];


    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
