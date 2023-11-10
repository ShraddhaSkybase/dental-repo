<?php

namespace App\Models;


use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BaseModel;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Teeth extends BaseModel implements HasMedia
{
    use  InteractsWithMedia ,HasFactory;

    // protected $fillable = [
    //     '_token',
       
    // ];

    protected $appends = ['image_url'];

    public function registerMediaConversions(Media $media = null): void
{
    $this
        ->addMediaConversion('preview')
        ->fit(Manipulations::FIT_CROP, 300, 300)
        ->nonQueued();
}

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class,'teeth_types');
        
    }

    function getImageUrlAttribute()
    {
        return $this->getImage('teeths');
    }
    



}
