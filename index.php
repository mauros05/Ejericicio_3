<?php 
	//json_encode("index");
	require_once("controllers/LoginController.php");
	$Login = new LoginController();
	$title = "Login";
	
	$metodo = $_SERVER['REQUEST_METHOD'];
	
	if($metodo == 'POST') {
		// Para mandar al registro del usuario
		// $respuesta = $Login->guardar($_POST);
		// $Login->registrar($respuesta,$_POST);
	
		// Para hacer el login
		$respuesta = $Login  -> validarLogin($_POST);
		
		$Login -> index($respuesta, $title, $_POST);

	} else {
		// $Login -> registrar();
		$Login -> index(NULL, $title, NULL);
	}
?>
