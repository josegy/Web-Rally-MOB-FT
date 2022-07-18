<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penpos extends Model
{
    public $timestamps = false;
    protected $table='penpos';
    
    public function pemains(){
        return $this->belongsToMany(Pemain::class, 'penpos_pemain', 'penpos_id', 'pemain_id')
        ->withPivot(['is_done']);
    }
}
