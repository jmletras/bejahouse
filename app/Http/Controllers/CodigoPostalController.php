<?php

namespace App\Http\Controllers;

use App\Models\CodigoPostal;
use Illuminate\Http\Request;

class CodigoPostalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\CodigoPostal  $codigoPostal
     * @return \Illuminate\Http\Response
     */
    public function show(CodigoPostal $codigoPostal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CodigoPostal $codigoPostal
     * @return \Illuminate\Http\Response
     */
    public function edit(CodigoPostal $codigoPostal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CodigoPostal $codigoPostal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CodigoPostal $codigoPostal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CodigoPostal $codigoPostal
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodigoPostal $codigoPostal)
    {
        //
    }

    public function obterCodigosPostais($id)
    {
		$codigos_postais = CodigoPostal::where('localidade_id', '=', $id)->orderBy('ext_cod_postal', 'asc')->get();
        return $codigos_postais;
    }
}
