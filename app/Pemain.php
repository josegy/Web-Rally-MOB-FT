<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    public $timestamps = false;
    protected $table='pemain';

    public function kartus()
    {
        return $this->belongsToMany(Kartu::class, 'kartu_pemain', 'kartu_id', 'pemain_id')
            ->withPivot(['id']);
    }
    public function penpos()
    {
        return $this->belongsToMany(Penpos::class, 'penpos_pemain', 'penpos_id', 'pemain_id')
            ->withPivot(['is_done']);
    }
}
