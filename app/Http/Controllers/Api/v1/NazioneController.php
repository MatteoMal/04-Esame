<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Nazione;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\NazioneCollection;
use App\Http\Resources\v1\NazioneCompletaCollection;
use App\Http\Resources\v1\NazioneCompletaResource;
use App\Http\Resources\v1\NazioneResource;
use Illuminate\Support\Facades\Gate;

class NazioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Nazione::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nazione  $nazione
     * @return \Illuminate\Http\Response
     */
    public function show(Nazione $nazione)
    {
       $risorsa = null;
       $tipo = request('tipo');
       if($tipo == "completo"){
        $risorsa = new NazioneCompletaResource($nazione);
       } else {
        $risorsa = new NazioneResource($nazione);
       }

       return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nazione  $nazione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nazione $nazione)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nazione  $nazione
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nazione $nazione)
    {
        //
    }
}


