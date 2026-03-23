<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
protected $fillable = [
    'title',
    'description',
    'category',
    'info',
    'results',
    'tags',
    'cover_image'
];

    public function images()
    {
        return $this->hasMany(WorkImage::class);
    }

    public function getTagsArrayAttribute()
    {
        return explode(',', $this->tags);
    }
}
