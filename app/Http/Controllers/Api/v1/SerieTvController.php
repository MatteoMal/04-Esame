<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SerieTvStoreRequest;
use App\Http\Requests\v1\SerieTvUpdateRequest;
use App\Http\Resources\v1\SerieTvCollection;
use App\Http\Resources\v1\SerieTvResource;
use App\Models\SerieTv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SerieTvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serieTv = null;
        if (Gate::allows('leggere')) {
           if (Gate::allows('Amministratore')) {
             $serieTv = SerieTv::all();
           } else {
            $serieTv = SerieTv::all()->where('visualizzato', 1);
           }
           return new SerieTvCollection($serieTv);
           if(request("idCategoria") != null) {
            $serieTv = $serieTv->where("idCategoria", request("idCategoria"));
        }
        } else {
            abort(403, 'PE_0001');
        }
    }

    public function indexCategoria($categoria)
    {
        $serieTv = null;
        if (Gate::allows('leggere')) {
           if (Gate::allows('Amministratore')) {
            $serieTv = SerieTv::all()->where('idCategoria',$categoria);
           } else {
            $serieTv = SerieTv::all()->where('idCategoria',$categoria)->where('visualizzato', 1);
           }
           return $this->creaCollection($serieTv);
        } else {
            abort(403, 'PE_0001');
        }
    }

    protected function creaCollection($film){
        return new SerieTvCollection($film);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SerieTvStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            $data = $request->validated();
            $serieTv = SerieTv::create($data);
            return new SerieTvResource($serieTv);
         } else {
             abort(403, 'PE_0006');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SerieTv  $serieTv
     * @return JsonResource
     */
    public function show(SerieTv $serieTV)
    {
        if (Gate::allows('leggere')){
            if (Gate::allows('Amministratore') || $serieTV->visualizzato){
                return new SerieTvResource($serieTV);
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
     * @param  \App\Models\SerieTv  $serieTv
     * @return \Illuminate\Http\Response
     */
    public function update(SerieTvUpdateRequest $request, SerieTv $serieTv)
    {
        if (Gate::allows('aggiornare')){
            $data = $request->validated();
            $serieTv->fill($data);
            $serieTv->save();
            return new SerieTvResource($serieTv);
        } else {
            abort(403, 'PE_0004');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SerieTv  $serieTv
     * @return \Illuminate\Http\Response
     */
    public function destroy(SerieTv $serieTv)
    {
        if (Gate::allows('eliminare')){
            $serieTv->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
