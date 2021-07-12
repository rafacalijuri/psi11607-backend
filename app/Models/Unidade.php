<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model{

    protected $table = 'geotr.unidade';
    protected $primaryKey = 'UnidadeId';
    public $incrementing = false;
    public $timestamps = false;

    public function propostas(){
        return $this->hasMany(Proposta::class);
    }

}