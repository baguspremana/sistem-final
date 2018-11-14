<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Babak extends Model
{
    protected $fillable = [
        'name',
    ];

    public function soal()
    {
    	return $this->hasMany('App\Soal');
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
