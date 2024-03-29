<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'deadline',
        'priority',
        'user_id',
        'project_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function project(){
        return $this->belongsTo(project::class);
    }

    public function messages(){
        return $this->hasMany(Message::class)->orderBy('created_at','Desc');
    }
}
