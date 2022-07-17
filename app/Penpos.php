<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penpos extends Model
{
    public $timestamps = false;
    protected $table='penpos';
    
    public function pemains(){
        return $this->belongsToMany(Pemain::class, 'penpos_pemain', 'pemain_id', 'penpos_id')
        ->withPivot(['is_done']);
    }
}
