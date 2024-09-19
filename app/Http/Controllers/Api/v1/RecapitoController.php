<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\RecapitoCollection;
use App\Models\Recapito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RecapitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recapito = null;
        if (Gate::allows('leggere')) {
           if (Gate::allows('Amministratore')) {
             $recapito = Recapito::all();
             if(request("idTipo") != null) {
                $recapito = $recapito->where("idTipologiaRecapito", request("idTipo"));
            }
           } else {
            $recapito = Recapito::all()->where('visualizzato', 1);
           }
           return new RecapitoCollection($recapito);
        } else {
            abort(403, 'PE_0001');
        }
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
     * @param  \App\Models\Recapito  $recapito
     * @return \Illuminate\Http\Response
     */
    public function show(Recapito $recapito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recapito  $recapito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recapito $recapito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recapito  $recapito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recapito $recapito)
    {
        //
    }
}
