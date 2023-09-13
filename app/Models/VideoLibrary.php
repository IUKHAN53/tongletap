<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLibrary extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'url'];

    public function getThumbnailAttribute($value)
    {
        if ($value == null) {
            return asset('assets/images/thumbnail.png');
        }
        return asset('uploads/thumbnails/' . $value);
    }
}
