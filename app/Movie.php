<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Movie extends Model
{
    protected $fillable = ['name', 'description', 'path', 'rating', 'year', 'poster', 'image', 'percent'];

    protected $appends = ['poster_path','image_path'];

    //attribute-------------------------------------

    public function getPosterPathAttribute()
    {
        return Storage::url('images/' . $this->poster);

    } //end of getPosterPathAttribute

    public function getImagePathAttribute()
    {
        return Storage::url('images/' . $this->image);

    } //end of getImagePathAttribute

    //relations ----------------------------------
    public function categories()
    {
        return $this->belongsToMany(Category::class,'movie_category');
    }

}
