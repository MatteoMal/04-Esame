<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\TipologiaIndirizzo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TipologiaIndirizzoStoreRequest;
use App\Http\Resources\v1\TipologiaIndirizzoCollection;
use App\Http\Resources\v1\TipologiaIndirizzoResource;
use App\Http\Resources\v1\TipologiaIndirizzoCompletoCollection;
use App\Http\Resources\v1\TipologiaIndirizzoCompletoResource;
use App\Http\Requests\v1\TipologiaIndirizzoUpdateRequest;

class TipologiaIndirizzoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        // dd(request('tipo'));
        $tipoIndirizzo = TipologiaIndirizzo::all();
        $risorsa = null;
        if (request("tipo") != null && request("tipo")=="completo"){
            $risorsa = new TipologiaIndirizzoCompletoCollection($tipoIndirizzo);
        } else {
            $risorsa = new TipologiaIndirizzoCollection($tipoIndirizzo);
        }
        return $risorsa;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\request\v1\TipologiaIndirizzoStoreRequest  $request
     * @return JsonResource
     */
    public function store(TipologiaIndirizzoStoreRequest $request)
    {
        $dati = $request->validated();
        $tipoIndirizzo=TipologiaIndirizzo::create($dati);
        return new TipologiaIndirizzoResource($tipoIndirizzo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipologiaIndirizzo  $tipologiaIndirizzo
     * @return JsonResource
     */
    public function show(TipologiaIndirizzo $tipologiaIndirizzo)
    {
       // return new TipologiaIndirizzoCompletoResource($tipologiaIndirizzo);

        $risorsa = null;
        if (request("tipo") != null && request("tipo")=="completo"){
            $risorsa = new TipologiaIndirizzoCompletoResource($tipologiaIndirizzo);
        } else {
            $risorsa = new TipologiaIndirizzoResource($tipologiaIndirizzo);
        }
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\requests\v1\TipologiaIndirizzoUpdateRequest  $request
     * @param  \App\Models\TipologiaIndirizzo  $tipologiaIndirizzo
     * @return JsonResource
     */
    public function update(TipologiaIndirizzoUpdateRequest $request, TipologiaIndirizzo $tipologiaIndirizzo)
    {
        //prelevare i dati -> sono nella $request

        //verificare i dati
        $dati = $request->validated();
        //preparare il model
        $tipologiaIndirizzo->fill($dati);
        //salvare
        $tipologiaIndirizzo->save();
        //ritornare la risorsa modificata
        return new TipologiaIndirizzoResource($tipologiaIndirizzo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipologiaIndirizzo  $tipologiaIndirizzo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipologiaIndirizzo $tipologiaIndirizzo)
    {
        $tipologiaIndirizzo->deleteOrFail();
        return response()->noContent();
    }
}
