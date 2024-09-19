<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gruppo;
use Illuminate\Foundation\Auth\User as ClassPerDate;

class Contatto extends ClassPerDate
{
    use HasFactory;

    protected $primaryKey = "idContatto";
    protected $table = "contatti";

    protected $with = ['recapiti', 'indirizzi', 'crediti'];
    
    protected $fillable = [
        'idGruppo',
        'idStato',
        'nome',
        'cognome',
        'sesso',
        'codiceFiscale',
        'partitaIva',
        'cittadinanza',
        'idNazioneNascita',
        'cittaNascita',
        'provinciaNascita',
        'dataNascita'
    ];

    //Aggiungi i ruoli per il contatto sulla tabella contatti_contattiRuoli

    public static function aggiungiContattoRuoli($idContatto, $idRuoli){
       $contatto = Contatto::where("idContatto", $idContatto)->firstOrFail();
       if (is_string($idRuoli)){
        $tmp = explode(',', $idRuoli);
       } else {
        $tmp = $idRuoli;
       }
       $contatto->ruoli()->attach($tmp);
       return $contatto->ruoli;
    }

    public function crediti(){
       return $this->hasOne(Credito::class, 'idContatto', 'idContatto');
    }

    //Elimina i ruoli per il contatto sulla tabella contatti_contattiRuoli

    public static function eliminaContattoRuoli($idContatto, $idRuoli){
        $contatto = Contatto::where("idContatto", $idContatto)->firstOrFail();
       if (is_string($idRuoli)){
        $tmp = explode(',', $idRuoli);
       } else {
        $tmp = $idRuoli;
       }
       $contatto->ruoli()->detach($tmp);
       return $contatto->ruoli;
    }

    public function indirizzi(){
        return $this->hasMany(Indirizzo::class, 'idContatto', 'idContatto')->orderBy('preferito', 'DESC');
     }

     public function recapiti(){
        return $this->hasMany(Recapito::class, 'idContatto', 'idContatto')->orderBy('preferito', 'DESC');
     }

     public function ruoli(){
        return $this->belongsToMany(Gruppo::class, 'contatti_contatti_ruoli', 'idContatto', 'idGruppo');
     }
}
