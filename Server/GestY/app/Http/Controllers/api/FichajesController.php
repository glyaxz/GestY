<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Fichaje;
use Illuminate\Http\Request;

class FichajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fichajes = Fichaje::paginate(600);
        return response()->json($fichajes);
    }

    public function getall(){
        $fichajes = Fichaje::all();
        return response()->json($fichajes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fichaje  $fichaje
     * @return \Illuminate\Http\Response
     */
    public function show(Fichaje $fichaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fichaje  $fichaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fichaje $fichaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fichaje  $fichaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fichaje $fichaje)
    {
        //
    }
}
