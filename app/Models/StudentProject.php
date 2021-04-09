<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StudentProject extends Model
{
    use HasFactory;

    protected $table = 'student_project';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'title', 'description', 'image', 'youtube_url'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image_url(): HasOne
    {
        return $this->hasOne(StudentMedia::class, 'id', 'image');
    }
}
