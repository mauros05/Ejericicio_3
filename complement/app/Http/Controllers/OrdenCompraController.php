<?php

namespace App\Http\Controllers;

use App\Models\orden_compra;
use Illuminate\Http\Request;

class OrdenCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "index";
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
        dd($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orden_compra  $orden_compra
     * @return \Illuminate\Http\Response
     */
    public function show(orden_compra $orden_compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orden_compra  $orden_compra
     * @return \Illuminate\Http\Response
     */
    public function edit(orden_compra $orden_compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orden_compra  $orden_compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orden_compra $orden_compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orden_compra  $orden_compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(orden_compra $orden_compra)
    {
        //
    }
}
