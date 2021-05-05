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

    protected $appends = ['resource_url', 'banner_media', 'thumbnail_media', 'user', 'video_id', 'video_platform'];

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'featured_project_user');
    }

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/featured-projects/' . $this->getKey());
    }

    public function getUserAttribute(){
        return $this->user()->get();
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

    public function getVideoPlatformAttribute(): ?string
    {
        if ($this->youtube_url == null){
            return null;
        }
        if (str_contains($this->youtube_url, 'youtube')){
            return 'youtube';
        }
        else if(str_contains($this->youtube_url, 'vimeo')){
            return 'vimeo';
        }
        else{
            return null;
        }
    }

    public function getVideoIdAttribute(): ?string
    {
        $type = $this->getVideoPlatformAttribute();
        if($type === 'youtube'){
            $parts = parse_url($this->youtube_url);
            parse_str($parts['query'], $query);
            return isset($query['v']) ? $query['v'] : null;
        }
        else if($type === 'vimeo'){
            return str_replace('https://vimeo.com/', '', $this->youtube_url);
        }
        return null;
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
