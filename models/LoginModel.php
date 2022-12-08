<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

	class LoginModel{
		
		public function __construct(){
			require_once 'connect/Connect.php';
			$this->connect = new Connect();
			$this->db = $this->connect->conexion();
		}

		public function guardar($datos){
			$query_validar = "SELECT usuario FROM usuarios WHERE email='".$datos['email']."' OR usuario='".$datos['username']."'";
			$res_valid 	   = mysqli_query($this->db, $query_validar);
			$message 	   = NULL;

			if(mysqli_num_rows($res_valid)> 0) {
				$message["mysql_error"] = "La informacion del Usuario ya existe";
				return $message;
			}
			
			$query_insertar = "INSERT INTO usuarios(usuario, nombres, ap_pat, ap_mat, email, password, status) 
						VALUES ('".$datos['username']."',
								'".$datos['nombres']."',
								'".$datos['ap_pat']."',
								'".$datos['ap_mat']."',
								'".$datos['email']."',
								'".$datos['password']."', 
								1)";
			$res_insert = mysqli_query($this->db,$query_insertar);

			if($res_insert){
				$message["mysql_success"] = "Usuario Guardado con exito";
				return $message;
			}

		}

		public function validarLogin($datos){
			$query         = "SELECT * FROM usuarios WHERE usuario='".$datos["usuario"]."' OR email='".$datos["usuario"]."' AND password='".$datos["password"]."' AND status=1";
			$resp_validar  = mysqli_query($this->db, $query);
			$errorMessage  = NULL;
            
            if(mysqli_num_rows($resp_validar) > 0){
                while($rows = mysqli_fetch_assoc($resp_validar)){
					$data["id_usuario"] = $rows["id_usuario"];
					$data["nombre"] = $rows["nombres"]." ".$rows["ap_pat"]." ".$rows["ap_mat"];
                }
				return $data;
            } else {
                return "Usuario Invalido";	
            }
		}


	}
?>