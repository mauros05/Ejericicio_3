<?php 
	require_once "controllers/UsuarioController.php";
	
	$Usuario = new UsuarioController();

	$method = $_SERVER['REQUEST_METHOD'];

	if($method == 'GET'){
		if(isset($_GET['ac'])){
			switch($_GET['ac']){
			case "m":
				$Usuario->verUsuario($_GET['i']);
				break;
			}
		} else {
			$Usuario->listarUsuario();
		}	
	} else {
		if(isset($_POST['btnAccion'])){
			switch($_POST['btnAccion']){
			case 'editar':
				$Usuario->editarUsuario($_POST);
				break;
			}
		}
	}



?>