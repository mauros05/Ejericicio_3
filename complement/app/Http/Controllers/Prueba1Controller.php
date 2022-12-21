<?php

namespace App\Http\Controllers;

use App\Models\prueba1;
use Illuminate\Http\Request;

class Prueba1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vista1');
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
     * @param  \App\Models\prueba1  $prueba1
     * @return \Illuminate\Http\Response
     */
    public function show(prueba1 $prueba1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prueba1  $prueba1
     * @return \Illuminate\Http\Response
     */
    public function edit(prueba1 $prueba1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prueba1  $prueba1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prueba1 $prueba1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prueba1  $prueba1
     * @return \Illuminate\Http\Response
     */
    public function destroy(prueba1 $prueba1)
    {
        //
    }
}
