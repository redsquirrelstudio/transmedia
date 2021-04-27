<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeaturedProjectUser extends Model
{
    use HasFactory;

    protected $table = 'featured_project_user';
    protected $primaryKey = 'id';
    protected $fillable = ['featured_project_id', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function featured_project(): BelongsTo
    {
        return $this->belongsTo(FeaturedProject::class);
    }
}
