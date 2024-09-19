<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\FilmStoreRequest;
use App\Http\Requests\v1\FilmUpdateRequest;
use App\Http\Resources\v1\FilmCollection;
use App\Http\Resources\v1\FilmCompletoCollection;
use App\Http\Resources\v1\FilmResource;
use App\Models\Film;
use Illuminate\Support\Facades\Gate;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        $film = null;
        if (Gate::allows('leggere')) {
           if (Gate::allows('Amministratore')) {
             $film = Film::all();
             if(request("idCategoria") != null) {
                $film = $film->where("idCategoria", request("idCategoria"));
            }
           } else {
            $film = Film::all()->where('visualizzato', 1);
           }
           return new FilmCollection($film);
        } else {
            abort(403, 'PE_0001');
        }

    }

    public function indexCategoria($categoria)
    {
        $film = null;
        if (Gate::allows('leggere')) {
           if (Gate::allows('Amministratore')) {
            $film = Film::all()->where('idCategoria',$categoria);
           } else {
            $film = Film::all()->where('idCategoria',$categoria)->where('visualizzato', 1);
           }
           return $this->creaCollection($film);
        } else {
            abort(403, 'PE_0001');
        }
    }

    protected function creaCollection($film){
        return new FilmCollection($film);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\requests\v1\FilmStoreRequest $request
     * @return \Illuminate\Http\Response
     * */
    public function store(FilmStoreRequest $request)
    {
        if (Gate::allows('creare')) {
            $data = $request->validated();
            $film = Film::create($data);
            return new FilmResource($film);
         } else {
             abort(403, 'PE_0006');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return JsonResource
     */
    public function show(Film $film)
    {
        if (Gate::allows('leggere')){
            if (Gate::allows('Amministratore') || $film->visualizzato){
                return new FilmResource($film);
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
     * @param  \Illuminate\Http\Request\v1\FilmUpdateRequest  $request
     * @param  Film $Film
     * @return JsonResource
     */
    public function update(FilmUpdateRequest $request, Film $film)
    {
        if (Gate::allows('aggiornare')){
            $data = $request->validated();
            $film->fill($data);
            $film->save();
            return new FilmResource($film);
        } else {
            abort(403, 'PE_0004');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        if (Gate::allows('eliminare')){
            $film->deleteOrFail();
            return response()->noContent();
        } else {
            abort(403, 'PE_0005');
        }
    }
}
