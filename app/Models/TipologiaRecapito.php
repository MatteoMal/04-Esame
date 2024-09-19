<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipologiaRecapito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tipologia_recapiti";
    protected $primaryKey = "idTipologiaRecapito";

    protected $fillable = [
        "nome"
    ];

    // elenco dei recapiti

    /**
     * 
    
    * @return \Illuminate\Http\Response

    */
    
    public function elencoRecapiti() {
        return $this->hasMany(Recapito::class, 'idTipologiaRecapito', 'idTipologiaRecapito'); //se non specifico ultimi 2 parametri li crea lui, ma darà errore
    }
}
