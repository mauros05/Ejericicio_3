<?php 
	class LoginController {
		public function __construct() {
			require_once 'models/LoginModel.php';
			$this->LoginModel = new LoginModel();
		}
		
		public function index($respuesta = NULL, $titulo = NULL, $dato = NULL){
			$data['Titulo']    = $titulo;
			$data['urlJquery'] = "assets/js/login.js";

			require_once "views/Templates/Header.php";
			require_once "views/Login.php";
			require_once "views/Templates/Footer.php";
		}

		public function validarLogin($data){
		
			$resValiar = NULL;

			if (empty($data['usuario'])) {
				$resValiar['usuario'] 	   = "El usuario no puede ir vacio";
				$resValiar['validar_user'] = "valuser"; 
			} 

			if (empty($data['password'])) {
				$resValiar['password'] 		   = "Password no puede ir vacio";
				$resValiar['validar_password'] = "valpass"; 
			}

			$res = $this->LoginModel->validarLogin($data);
		
			if(!empty($res['id_usuario'])) {
                session_start();
				$_SESSION = $res;
				$resValiar['mensaje'] = "Bienvenida";
				$resValiar['validar'] = 1;
          	} else {
				$resValiar['mensaje'] = $res;
				$resValiar['validar'] = 0;
			}

			echo json_encode($resValiar);
			exit;
		}
		
		public function registrar($respuesta = NULL, $dato = NULL) {
			$data['Titulo'] = "Registrar";

			require_once "views/Templates/Header.php";
			require_once "views/Registrar.php";
			require_once "views/Templates/Footer.php";
		}
		
		public function guardar($data) {
			
			require_once 'models/LoginModel.php';

			$respuesta = NULL;
			if(empty($data['nombres'])) {
				$respuesta['nombre'] = "Nombre no puede ir vacio";
			} 
	
			if (empty($data['ap_pat'])) {
				$respuesta['ap_pat'] = "Apellido paterno no puede ir vacio";
			} 
		
			if (empty($data['ap_mat'])) {
				$respuesta['ap_mat'] = "Apellido Materno no puede ir vacio";
			} 
			
			if (empty($data['email'])) {
				$respuesta['email'] = "Email no puede ir vacio"; 
			} 

			if (empty($data['password'])) {
				$respuesta['password'] = "Password no puede ir vacio"; 
			}
			
			if (!is_null($respuesta)) {
				return $respuesta;
			}
			
			$usuario 		  = explode(' ', $data['nombres']);
			$data['username'] = $usuario[0].$data['ap_pat'];
			$data['status']   = 1;
		
			
			$respuesta = $this->LoginModel->guardar($data);

			return $respuesta;
		}	
	}
?>