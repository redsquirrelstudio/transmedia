<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'year',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified' => 'boolean',
        'year' => 'integer',
    ];

    protected $appends = ['resource_url', 'page_url'];

    public function page(): HasOne
    {
        return $this->hasOne(Page::class);
    }

    public function getCourse(): Course
    {
        return $this->page->course;
    }

    public function getResourceUrlAttribute(): string
    {
        return url('/admin/users/'.$this->getKey());
    }

    public function getPageUrlAttribute(): string
    {
        return route('page.student', $this->id);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(StudentProject::class);
    }
}
