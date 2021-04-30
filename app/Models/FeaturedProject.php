<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        'description',
        'youtube_url',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ['resource_url', 'banner_media', 'thumbnail_media', 'user'];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'featured_project_user');
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/featured-projects/' . $this->getKey());
    }

    public function getBannerMediaAttribute(): ?string
    {
        $banners = $this->getMedia('banners');
        if($banners->count() > 0){
            return $banners[0]->getFullUrl();
        }
        return null;
    }

    public function getThumbnailMediaAttribute(): array
    {
        $thumbs = $this->getMedia('thumbnails');
        $urls = [];
        foreach($thumbs as $thumb){
            $urls[] = $thumb->getFullUrl();
        }
        return $urls;
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
