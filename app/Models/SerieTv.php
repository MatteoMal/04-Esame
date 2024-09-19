<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerieTv extends Model
{
    use HasFactory;

    protected $table = "serie_tv";
    protected $primaryKey = "idSerieTv";

    protected $fillable = [
        'idCategoria',
        'nome',
        'descrizione',
        'totaleStagioni',
        'numeroEpisodio',
        'regista',
        'attori',
        'annoInizio',
        'annoFine',
        'idImmagine',
        'idFilmato'
    ];

    public function elencoEpisodi() {
        return $this->hasMany(Episodio::class, 'idSerieTv', 'idSerieTv'); //se non specifico ultimi 2 parametri li crea lui, ma darà errore
    }
}
