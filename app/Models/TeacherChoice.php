<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherChoice extends Choice
{
    use HasFactory;

    protected $table = 'choices';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('teacherChoice', function (Builder $builder) {
            $builder->where('teacher_id',auth()->id());
        });
    }
}
