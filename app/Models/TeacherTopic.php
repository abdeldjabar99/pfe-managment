<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherTopic extends Topic
{
    use HasFactory;

    protected $table = 'topics';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('teacherTopics', function (Builder $builder) {
            $builder->where('user_id',auth()->id());
        });
    }
}
