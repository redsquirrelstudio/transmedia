<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudentMedia extends Model
{
    use HasFactory;

    protected $table = 'student_media';
    protected $primaryKey = 'id';
    protected $fillable = ['description', 'file_name', 'file_url'];
    

    public function page(): BelongsToMany
    {
        return $this->belongsToMany(Page::class, 'page_work');
    }
}
