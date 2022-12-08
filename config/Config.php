<?php 
    session_start();
	
	//$_CONSTANT['url'] = 'http://localhost/Mentoring/Ejericicio_3/';
	
	// Define se usa por buenas practicas
	define('URL','http://localhost/Mentoring/Ejericicio_3/');
	
	if(!isset($_SESSION["id_usuario"])){
		header("location:".URL."index.php");
	}
	
?>