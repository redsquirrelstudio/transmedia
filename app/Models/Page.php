<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    protected $table = 'page';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'course_id', 'tagline', 'bio', 'avatar_url', 'portfolio_url', 'banner_url', 'work_urls'];
    protected $casts = [
        'work_urls' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
