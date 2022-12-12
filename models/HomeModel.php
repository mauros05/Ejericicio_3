<?php 
	class HomeModel{
		public function __construct(){
			require_once "connect/Connect.php";
			$connect = new Connect();
			$this->con=$connect->conexion();
		}
		
		public function getRol(){
			$rol_query = "SELECT * 
						  FROM permisos p 
						  LEFT JOIN roles r 
						  ON r.id_rol = p.id_rol 
						  WHERE p.id_usuario=".$_SESSION["id_usuario"];
			
			$res_rol = mysqli_query($this->con,$rol_query);

			if(mysqli_num_rows($res_rol)>0){
				while($row = mysqli_fetch_assoc($res_rol)){
					$data['rol'] = $row['id_rol'];
				}
			} else {
				$data['rol'] = 0;
			}
			
			return $data;
		}
		
	}

?>