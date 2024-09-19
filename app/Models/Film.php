<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = "film";
    protected $primaryKey = "idFilm";

    protected $fillable = [
        'idFilm',
        'idCategoria',
        'titolo',
        'descrizione',
        'durata',
        'regista',
        'attori',
        'anno',
        'idImmagine',
        'idFilmato',
        'categoria'
    ];
}
