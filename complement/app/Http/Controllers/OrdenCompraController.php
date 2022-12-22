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
    public function store(Request $request) {
        $arregloProductos=[];

        for($i=0; $i < count($request['id_producto']) ; $i++){
            $arregloDatos=array(
                                'id_producto'=>$request['id_producto'],
                                'nomProducto'=> $request['nombreProducto'][$i],
                                'categoria'=>$request['Categoria'][$i],
                                'cantidad'=>$request['Cantidad'][$i],
                                'codigo_producto'=>$request['codigoProducto'][$i]
                                );
            array_push($arregloProductos,$arregloDatos);
        }

        $request["productos"] = json_encode($arregloProductos,true);

        $orden = new orden_compra;
        $orden->id_solicitud    =  $request['id_solicitud'];
        $orden->fecha_orden     =  $request['fecha'];
        $orden->id_proveedor    =  $request['id_proveedor'];
        $orden->productos       =  $request['productos'];
        $orden->total           =  $request['totalGeneral'];
        $orden->id_usuario_co   =  $request['id_usuario_co'];
        $orden->descripcion     =  $request['descripcion'];
        $orden->status          =  $request['status'];

        $orden->save();

        if($orden->save()){
            echo json_encode("Se envio orden");
        }else{
            echo json_encode("Se envio orden");
        }
        
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
