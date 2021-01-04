<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Spatie\MediaLibrary\HasMedia;


class Post extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    //registrácia kolekcie médii (obrázky/pdf/videá),
    //v resources/js/post/form.js
    //su tieto kolekcie spomenute
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery')
            ->accepts('image/*')
            ->maxNumberOfFiles(20);
        $this->addMediaCollection('thumbnail')
            ->accepts('image/*')
            ->maxNumberOfFiles(1);
    }
    //Vytvorenie thumbnailu pre upload obrazkov
    //tieto funkcie patria knižnici medialibrary
    //Viac sa dozvieš v dokumentácii
    //https://spatie.be/docs/laravel-medialibrary/v9/introduction
    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();
    }

    protected $fillable = [
        'title',
        'slug',
        'perex',
        'text',
        'published_at',
        'enabled',
        'views',

    ];


    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/posts/' . $this->getKey());
    }
}
