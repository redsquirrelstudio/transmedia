<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model
{
    use HasFactory;

    protected $table = 'page';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'course_id', 'tagline', 'bio', 'avatar', 'portfolio_url', 'instagram_url', 'banner'];
    protected $casts = [
        'work_urls' => 'array',
        'course_id' => 'integer'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function avatar_image(): HasOne
    {
        return $this->hasOne(StudentMedia::class, 'id', 'avatar');
    }

    public function banner_image(): HasOne
    {
        return $this->hasOne(StudentMedia::class, 'id', 'banner');
    }

}
