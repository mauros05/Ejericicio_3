<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Prueba1Model;

class Prueba1 extends BaseController
{
    public function index()
    {
        $prueba1 = new Prueba1Model();
        $datos["res"] = $prueba1->find();
        // echo "<pre>";
        // var_dump($res);
        $datos["respuesta"] = $prueba1->departamentosUsuarios();
        // echo "<pre>";
        // var_dump($respuesta);
        $data = ["departamento" =>"sistemas", "id_usuario"=>"5"];
        $prueba1->insert($data);
        return view("prueba1", $datos).view("prueba2");

    }

    public function guardar(){
        $prueba1 = new Prueba1Model();
        $data = ['departamento'=>'sistemas', 'id_usuario'=>'5'];
        $prueba1->insert($data);
    }
}
