<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    public $timestamps = false;
    
    public function kartus()
    {
        return $this->belongsToMany(Kartu::class, 'kartu_pemain', 'kartu_id', 'pemain_id')
            ->withPivot(['id']);
    }
    public function pemains()
    {
        return $this->belongsToMany(Pemain::class, 'penpos_pemain', 'pemain_id', 'penpos_id')
            ->withPivot(['is_done']);
    }
}
