<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\EpisodioStoreRequest;
use App\Http\Requests\v1\EpisodioUpdateRequest;
use App\Http\Resources\v1\EpisodioCollection;
use App\Http\Resources\v1\EpisodioCompletoCollection;
use App\Http\Resources\v1\EpisodioResource;
use App\Models\Episodio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EpisodioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodio = null;
        if (Gate::allows('leggere')) {
           if (Gate::allows('Amministratore')) {
             $episodio = Episodio::all();
             if(request("idSerieTv") != null) {
                $episodio = $episodio->where("idSerieTv", request("idSerieTv"));
            }
           } else {
            $episodio = Episodio::all()->where('visualizzato', 1);
           }
           return new EpisodioCollection($episodio);
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
    public function store(EpisodioStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            $data = $request->validated();
            $episodio = Episodio::create($data);
            return new EpisodioResource($episodio);
         } else {
             abort(403, 'PE_0006');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episodio  $episodio
     * @return \Illuminate\Http\Response
     */
    public function show(Episodio $episodio)
    {
        if (Gate::allows('leggere')){
            if (Gate::allows('Amministratore') || $episodio->visualizzato){
                return new EpisodioResource($episodio);
            } else {
                abort(404, 'PE_0003');
            }
        } else {
            abort(403, 'PE_0002');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episodio  $episodio
     * @return \Illuminate\Http\Response
     */
    public function update(EpisodioUpdateRequest $request, Episodio $episodio)
    {
        if (Gate::allows('aggiornare')){
            $data = $request->validated();
            $episodio->fill($data);
            $episodio->save();
            return new EpisodioResource($episodio);
        } else {
            abort(403, 'PE_0004');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episodio  $episodio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episodio $episodio)
    {
        if (Gate::allows('eliminare')){
            $episodio->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
