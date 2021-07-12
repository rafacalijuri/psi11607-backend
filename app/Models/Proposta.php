<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Proposta extends Model{

    protected $table = 'geotr.proposta';
    protected $primaryKey = 'PropostaId';
    public $incrementing = false;
    public $timestamps = false;

    public function unidade(){
        return $this->belongsTo(Unidade::class);
    }

}