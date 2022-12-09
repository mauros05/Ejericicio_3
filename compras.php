<?php
    require_once "controllers/ComprasController.php";

    $comprasController = new comprasController();

    $method = $_SERVER['REQUEST_METHOD'];

    if($method == 'GET'){
        if(isset($_GET['ac'])){
			switch($_GET['ac']){
			case "cs":
				$comprasController->crearSolicitud();
				break;
            case "ms":
                $comprasController->miSolicitud();
                break;
            case "vs":
                $comprasController->verSolicitud();
                break;
			}
		} 
    } else {
        if(isset($_POST['cod_producto'])){
            $comprasController->buscarProducto($_POST["cod_producto"]);   
        } else {
            $resp = $comprasController->guardarSolicitud($_POST);

            if($resp == TRUE){
                $comprasController->miSolicitud();
            }
        }
    }



?>