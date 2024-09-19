<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Indirizzo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "indirizzi";
    protected $primaryKey = "idIndirizzo";

    protected $fillable = [
           "idContatto",
           "idTipologiaIndirizzo",
           "idNazione",
           "idComuneItaliano",
           "indirizzo",
           "civico",
           "cap",
           "localita",
           "comune"
    ];

    //Funzione per ritorno di appartenenza
    public function tipologiaIndirizzo() {
        return $this->belongsTo(TipologiaIndirizzo::class, 'idTipologiaIndirizzo', 'idTipologiaIndirizzo');
    }
    public function comuneItaliano() {
        return $this->belongsTo(ComuneItaliano::class, 'idComuneItaliano', 'idComuneItaliano');
    }
}
