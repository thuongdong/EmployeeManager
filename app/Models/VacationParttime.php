<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VacationParttime extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

    public function user() {
    	return $this->belongsTo(User::class);
    }

}
