<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'employee_id',
        'title',
        'start_date',
        'end_date',
        'color',
        'description',
        'created_by',
    ];
    public function company()
    {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
