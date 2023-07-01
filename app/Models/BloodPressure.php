<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressure extends Model
{
	use HasFactory;
	protected $table = "blood_pressure";

	protected $fillable = [
		'sys',
		'dia',
		'datetime',
	];
}
