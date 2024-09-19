<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TipologiaRecapitoStoreRequest;
use App\Http\Requests\v1\TipologiaRecapitoUpdateRequest;
use App\Http\Resources\v1\TipologiaRecapitoCollection;
use App\Http\Resources\v1\TipologiaRecapitoCompletoCollection;
use App\Http\Resources\v1\TipologiaRecapitoCompletoResource;
use App\Http\Resources\v1\TipologiaRecapitoResource;
use App\Models\TipologiaRecapito;
use Illuminate\Http\Request;

class TipologiaRecapitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request('tipo'));
        $tipologiaRecapito = TipologiaRecapito::all();
        $risorsa = null;
        if (request("tipo") != null && request("tipo")=="completo"){
            $risorsa = new TipologiaRecapitoCompletoCollection($tipologiaRecapito);
        } else {
            $risorsa = new TipologiaRecapitoCollection($tipologiaRecapito);
        }
        return $risorsa;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipologiaRecapitoStoreRequest $request)
    {
        $dati = $request->validated();
        $tipologiaRecapito=TipologiaRecapito::create($dati);
        return new TipologiaRecapitoResource($tipologiaRecapito);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipologiaRecapito  $tipologiaRecapito
     * @return \Illuminate\Http\Response
     */
    public function show(TipologiaRecapito $tipologiaRecapito)
    {
        // return new TipologiaRecapitoCompletoResource($tipologiaRecapito);

        $risorsa = null;
        if (request("tipo") != null && request("tipo")=="completo"){
            $risorsa = new TipologiaRecapitoCompletoResource($tipologiaRecapito);
        } else {
            $risorsa = new TipologiaRecapitoResource($tipologiaRecapito);
        }
        return $risorsa;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipologiaRecapito  $tipologiaRecapito
     * @return \Illuminate\Http\Response
     */
    public function update(TipologiaRecapitoUpdateRequest $request, TipologiaRecapito $tipologiaRecapito)
    {
        //prelevare i dati -> sono nella $request

        //verificare i dati
        $dati = $request->validated();
        //preparare il model
        $tipologiaRecapito->fill($dati);
        //salvare
        $tipologiaRecapito->save();
        //ritornare la risorsa modificata
        return new TipologiaRecapitoResource($tipologiaRecapito);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipologiaRecapito  $tipologiaRecapito
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipologiaRecapito $tipologiaRecapito)
    {
        $tipologiaRecapito->deleteOrFail();
        return response()->noContent();
    }
}
