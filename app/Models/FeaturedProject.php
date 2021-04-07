<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FeaturedProject extends Model implements HasMedia
{
    use HasMediaCollectionsTrait;
    use AutoProcessMediaTrait;
    use ProcessMediaTrait;
    use HasMediaThumbsTrait;


    protected $table = 'featured_project';

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'youtube_url',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'user_id'
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/featured-projects/' . $this->getKey());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnails')
            ->accepts('image/*')
            ->maxNumberOfFiles(4);

        $this->addMediaCollection('banners')
            ->accepts('image/*')
            ->maxNumberOfFiles(1);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();
    }
}
