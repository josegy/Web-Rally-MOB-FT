<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
    public $timestamps = false;
    public function pemains(){
        return $this->belongsToMany(Pemain::class, 'kartu_pemain', 'pemain_id', 'kartu_id')
        ->withPivot(['id']);
    }
}
