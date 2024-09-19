<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\IndirizzoStoreRequest;
use App\Http\Requests\v1\IndirizzoUpdateRequest;
use App\Http\Resources\v1\IndirizzoCollection;
use App\Http\Resources\v1\IndirizzoResource;
use Illuminate\Http\Request;
use App\Models\Indirizzo;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class IndirizzoController extends Controller
{

    public static function altro(){
        DB::transaction(function(){
            //codici SQL
            // DB::table("indirizzi")->update()


        },5 );
        }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        $indirizzo = null;
        if (Gate::allows('leggere')) {
           if (Gate::allows('Amministratore')) {
             $indirizzo = indirizzo::all();
            if(request("idContatto") != null) {
                $indirizzo = $indirizzo->where("idContatto", request("idContatto"));
            }
            if(request("idNazione") != null) {
                $indirizzo = $indirizzo->where("idNazione", request("idNazione"));
            }
            if(request("idComuneItaliano") != null) {
                $indirizzo = $indirizzo->where("idComuneItaliano", request("idComuneItaliano"));
            }
            if(request("idTipo") != null) {
                $indirizzo = $indirizzo->where("idTipologiaIndirizzo", request("idTipo"));
            }
           } else {
            $indirizzo = Indirizzo::all()->where('visualizzato', 1);
           }
           return new IndirizzoCollection($indirizzo);
        } else {
            abort(403, 'PE_0001');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\request\v1\IndirizzoStoreRequest  $request
     * @return JsonResource
     */
    public function store(IndirizzoStoreRequest $request)
    {
        $dati = $request->validated();
        $tipoIndirizzo=Indirizzo::create($dati);
        return new IndirizzoResource($tipoIndirizzo);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Indirizzo
     * @return JsonResource
     */
    public function show($indirizzo)
    {
        return new IndirizzoResource($indirizzo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\v1\IndirizzoUpdateRequest  $request
     * @param  Indirizzo $indirizzo
     * @return JsonResource
     */
    public function update(IndirizzoUpdateRequest $request, Indirizzo $indirizzo)
    {
        $dati = $request->validated();
        $indirizzo->fill($dati);
        $indirizzo->save();
        return new IndirizzoResource($indirizzo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Indirizzo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indirizzo $indirizzo)
    {
        $indirizzo->deleteOrFail();
        return response()->noContent();
    }
}
