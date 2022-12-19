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
            case "buscarSolicitud":
                $comprasController->buscarSolicitud($_GET["idSolicitud"]);
                break;
			}
		} 
    } else {
        if(isset($_POST['cod_producto'])){
            $comprasController->buscarProducto($_POST["cod_producto"]);   
        } elseif(isset($_POST['accion'])){
            switch($_POST['accion']){
                case "cancelar":
                    $comprasController->cancelarSolicitud($_POST['idSolicitud']);
                    break;
                case "enviarcompras":
                    $comprasController->aceptarSolicitud($_POST['idSolicitud']);
                    break;
            }

        } else {
            $resp = $comprasController->guardarSolicitud($_POST);
        }
    }



?>