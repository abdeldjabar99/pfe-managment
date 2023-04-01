<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'technology',
        'user_id',
        'special_id',
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'user_id');
    }

    public function special(): BelongsTo
    {
        return $this->belongsTo(specialization::class);
    }

}
