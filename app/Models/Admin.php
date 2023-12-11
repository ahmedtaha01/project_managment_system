<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'provider_id',
        'number_of_projects',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'password',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function message(){
        return $this->morphMany(Message::class,'messageable');
    }
}
