<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glucose extends Model
{
	use HasFactory;

	protected $table = "glucose";
	protected $fillable = [
		'mgdl',
		'measure_type',
		'datetime',
	];
}
