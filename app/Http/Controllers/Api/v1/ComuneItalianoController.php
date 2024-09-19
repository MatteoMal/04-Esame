<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\ComuneItalianoStoreRequest;
use App\Http\Requests\v1\ComuneItalianoUpdateRequest;
use App\Http\Resources\v1\ComuneItalianoCollection;
use App\Http\Resources\v1\ComuneItalianoCompletoCollection;
use App\Http\Resources\v1\ComuneItalianoResource;
use App\Models\ComuneItaliano;
use Illuminate\Http\Request;

class ComuneItalianoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(request('tipo'));
        return ComuneItaliano::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComuneItalianoStoreRequest $request)
    {
        $dati = $request->validated();
        $comuneItaliano=ComuneItaliano::create($dati);
        return new ComuneItalianoResource($comuneItaliano);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ComuneItaliano  $comuneItaliano
     * @return \Illuminate\Http\Response
     */
    public function show(ComuneItaliano $comuneItaliano)
    {
        return new ComuneItalianoResource($comuneItaliano);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComuneItaliano  $comuneItaliano
     * @return \Illuminate\Http\Response
     */
    public function update(ComuneItalianoUpdateRequest $request, ComuneItaliano $comuneItaliano)
    {
        $dati = $request->validated();
        $comuneItaliano->fill($dati);
        $comuneItaliano->save();
        return new ComuneItalianoResource($comuneItaliano);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComuneItaliano  $comuneItaliano
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComuneItaliano $comuneItaliano)
    {
        $comuneItaliano->deleteOrFail();
        return response()->noContent();
    }
}
