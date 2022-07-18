<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
    public $timestamps = false;
    protected $table='kartu';
    
    public function pemains(){
        return $this->belongsToMany(Pemain::class, 'kartu_pemain', 'kartu_id', 'pemain_id')
        ->withPivot(['id']);
    }
}
