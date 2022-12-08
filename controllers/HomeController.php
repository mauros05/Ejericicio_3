<?php 
	require_once "config/Config.php";
	
	class HomeController{
		public function __construct(){
			require_once "models/HomeModel.php";
			$this->HomeModel = new HomeModel();
		}

		public function home(){
			$data['Titulo']  = 'Home';
			
			if(!isset($_SESSION['id_rol'])){
				$resrol = $this->HomeModel->getRol();
				if(isset($resrol['rol'])){
					$_SESSION['id_rol'] = $resrol['rol'];	
				}
			}

			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/Home.php";
			require_once "views/Templates/Footer.php";
		}
		

		
		
	}
?>