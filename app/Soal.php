<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable = [
        'babak_id', 'isi_soal', 'view',
    ];

    public function babak()
    {
    	return $this->belongsTo('App\Babak','babak_id');
    }

}
