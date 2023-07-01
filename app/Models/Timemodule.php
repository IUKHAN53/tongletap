<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timemodule extends Model
{
	use HasFactory;

	protected $table = "timemodule";
	protected $fillable = [
		'company_hours',
		'company_name',
	];
}
