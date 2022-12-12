<?php 
	require_once "config/Config.php";
	class UsuarioController {
		public function __construct(){
			require_once "models/UsuarioModel.php";
			$this->UsuarioModel = new UsuarioModel();
		}
		
		public function listarUsuario(){
			$res 		     = $this->UsuarioModel->listarUsuarios();
			$data['Titulo']  = 'Lista de Usuarios';

			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/UsuariosVista/listUsuario.php";
			require_once "views/Templates/Footer.php";
		}

		public function verUsuario($id){
			$resObtenerUsuario = $this->UsuarioModel->obtenerUsuarios($id);
			$resCatRol 		   = $this->UsuarioModel->obtenerCatRol();
			$data['Titulo']    = 'Editar de Usuarios';
			
			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/UsuariosVista/editUsuario.php";
			require_once "views/Templates/Footer.php";
		}

		public function editarUsuario($data){
			// Realizar Validacion
			//if(empty($data['nombres'])){		
			//}
			$primerNombre = explode(' ', $data["nombres"]);
			$data["usuario"] = $primerNombre[0] . $data["ap_pat"];

			$resEditarUsuario = $this->UsuarioModel->editarUsuario($data);

			if($resEditarUsuario == TRUE){
				header("location: usuario.php");
			}
		}
		
		
	}
?>