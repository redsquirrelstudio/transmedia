<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';
    protected $primaryKey = "id";
    protected $fillable = ["name", "plural", "slug"];

    public function page(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
