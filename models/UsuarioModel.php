<?php 
	class UsuarioModel{
		public function __construct(){
			require_once "connect/Connect.php";
			$connect = new Connect();
			$this->con=$connect->conexion();
		}
		
		public function listarUsuarios(){
			$queryListar = "SELECT * FROM usuarios";
			$resListar   = mysqli_query($this->con,$queryListar);
			
			if(mysqli_num_rows($resListar)>0){
				$i=0;
				while($row = mysqli_fetch_assoc($resListar)){
					$data['id_usuario'][$i] = $row["id_usuario"];
					$data['usuario'][$i]  	= $row["usuario"];
					$data['nombres'][$i]  	= $row["nombres"];
					$data['ap_pat'][$i]   	= $row["ap_pat"];
					$data['ap_mat'][$i]   	= $row["ap_mat"];
					$data['email'][$i]    	= $row["email"];
					$data['password'][$i] 	= $row["password"];
					$data['status'][$i]   	= $row["status"];
					$i++;
				}
			}else{
				$data['error_message_listar'] = "No se he encontrado ningun usuario";
			}
			return $data;
		}

		public function obtenerUsuarios($id){
			$queryObtener = "SELECT u.*, r.* 
								FROM usuarios u 
								LEFT JOIN permisos p 
								ON u.id_usuario = p.id_usuario 
								LEFT JOIN roles r 
								ON r.id_rol = p.id_rol 
								WHERE u.id_usuario=".$id;
			$resObtener  = mysqli_query($this->con, $queryObtener);
			
			if(mysqli_num_rows($resObtener)>0){
				while($row = mysqli_fetch_assoc($resObtener)){
					$data['id_usuario'] = $row["id_usuario"];
					$data['usuario']  	= $row["usuario"];
					$data['nombres']  	= $row["nombres"];
					$data['ap_pat']   	= $row["ap_pat"];
					$data['ap_mat']   	= $row["ap_mat"];
					$data['email']    	= $row["email"];
					$data['password'] 	= $row["password"];
					$data['status']   	= $row["status"];
					$data['id_rol']  	= $row["id_rol"];
					$data['rol']   		= $row["rol"];
				}
			}else{
				$data['error_message_obtener'] = "No se he encontrado el usuario";
			}
			return $data;
		}

		public function obtenerCatRol(){
			$queryRol   = "SELECT * FROM roles";
			$resObtener = mysqli_query($this->con, $queryRol);
			if(mysqli_num_rows($resObtener)>0){
				$i=0;
				while($row = mysqli_fetch_assoc($resObtener)){
					$data['id_rol'][$i] = $row["id_rol"];
					$data['rol'][$i]    = $row["rol"];
					$i++;
				}
			}else{
				$data['error_message_obtener'] = "No hay roles disponibles";
			}
			return $data;
		}

		public function editarUsuario($data){
			
			$queryVerificar = "SELECT * FROM usuarios WHERE 
							   id_usuario=".$data["id_usuario"]."
							   AND nombres='".$data["nombres"]."'
							   AND usuario='".$data["usuario"]."' 
							   AND ap_pat='".$data["ap_pat"]."'
							   AND ap_mat='".$data["ap_mat"]."'
							   AND email='".$data["email"]."'
							   AND status='".$data["status"]."'";

			$resVerificar  = mysqli_query($this->con, $queryVerificar);

			if(mysqli_num_rows($resVerificar) == 0){
				$queryEditarUsuario = "UPDATE usuarios SET nombres='".$data["nombres"]."',
													usuario='".$data["usuario"]."',
													ap_pat='".$data["ap_pat"]."',
													ap_mat='".$data["ap_mat"]."',
													email='".$data["email"]."',
													status='".$data["status"]."'
													WHERE id_usuario='".$data["id_usuario"]."'";
													
				$resEditar  = mysqli_query($this->con, $queryEditarUsuario);
			}

			$queryVerficarPermiso = "SELECT * FROM permisos WHERE 
									 id_usuario='" . $data["id_usuario"] ."'
								  	 AND id_rol='".$data["rol"]."'";

			$resVerSficarPermiso = mysqli_query($this->con, $queryVerficarPermiso);
			
			if(mysqli_num_rows($resVerSficarPermiso)==0){
				$queryEditarPermiso = "UPDATE permisos SET 
									   id_rol='".$data["rol"]."'
									   WHERE id_usuario='".$data["id_usuario"]."'";
													
				$resEditarPermiso  = mysqli_query($this->con, $queryEditarPermiso);
			}

			$dato['act_message'] = TRUE;
			return $dato;
		}
	}
?>