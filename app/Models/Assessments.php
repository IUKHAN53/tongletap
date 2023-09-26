<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessments extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'url'
    ];

    public function getImageAttribute($value)
    {
        if (str_starts_with($value, 'http')) {
            return $value;
        }
        return asset('uploads/assessments/' . $value);
    }
}
