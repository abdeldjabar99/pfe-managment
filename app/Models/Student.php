<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    use HasFactory;
    
    protected $table = 'users';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('student', function (Builder $builder) {
            $builder->where('role_id', Role::STUDENT);
        });
    }
}
