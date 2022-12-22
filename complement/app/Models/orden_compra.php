<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orden_compra extends Model
{
    use HasFactory;
    protected $table = 'ordenes'; // A que tabla va guarrdar

    protected $primaryKey = "id_orden";

    public $timestamps = false;

    protected $fillable = ['id_solicitud',
                            'fecha_orden',
                            'id_proveedor',
                            'productos',
                            'total',
                            'id_usuario_co',
                            'descripcion',
                            'status'                        
                        ];

    // Metodo Victor
    // public function guardarOrden($datos){
    //     $row = new orden_compra();
    //     $row->id_solicitud = $datos["id_solicitud"];
    //     $row->fecha_orden = $datos["fecha"];
    //     $row->id_proveedor = $datos["id_proveedor"];
    //     $row->productos = $datos["productos"];
    //     $row->total = $datos["totalGeneral"];
    //     $row->id_usuario_co = $datos["id_usuario_co"];
    //     $row->descripcion = $datos["descripcion"];
    //     $row->status = $datos["status"];

    //     $row->save();

    //     return $row->id_orden;
    // }
}
