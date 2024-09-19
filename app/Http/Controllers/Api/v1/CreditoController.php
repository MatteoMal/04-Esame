<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CreditoStoreRequest;
use App\Http\Requests\v1\CreditoUpdateRequest;
use App\Http\Resources\v1\CreditoCollection;
use App\Http\Resources\v1\CreditoResource;
use App\Models\Credito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credito = Credito::all();
        if(request("idContatto") != null) {
            $credito = $credito->where("idContatto", request("idContatto"));
        }
        return $credito;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreditoStoreRequest $request)
    {
        $dati = $request->validated();
        $credito=Credito::create($dati);
        return new CreditoResource($credito);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show(Credito $credito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCredito(CreditoUpdateRequest $request, Credito $credito)
    {
        if (Gate::allows('aggiornare')){
            if (Gate::allows('Amministratore') || $credito->visualizzato){
                $dati = $request->validated();
                $credito->fill($dati);
                $credito->save();
                return new CreditoResource($credito);
        } else {
            abort(404, 'PE_0003');
        } 
    } else {
            abort(403, 'PE_0004');
        };
    }

    protected function creaCollection($film){
        return new CreditoCollection($film);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        //
    }
}
