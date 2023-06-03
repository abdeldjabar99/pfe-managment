<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Choice extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'topic_id',
        'comment',
        'is_accpted',
        'is_binome',
        'binome_id',

    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function binome(): BelongsTo
    {
        return $this->belongsTo(Student::class) ? $this->belongsTo(Student::class) :'not have binome';
    }


    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

}
