<?php 
    class ComprasModel{
        public function __construct(){
            require_once "connect/Connect.php";
			$connect = new Connect();
			$this->con=$connect->conexion();
        }
		
		public function getFolio(){
			$query = "SELECT * FROM folios WHERE id_folio = 1"; // Query para solicitudes
			
			$resQuery = mysqli_query($this->con,$query);
			
			while($row=mysqli_fetch_assoc($resQuery)){
				$folio = $row['numero_folio'] + 1;
			}
			
			return $folio;
		}
		
		public function getUsuario(){
			$query = "SELECT u.nombres, 
							 u.ap_pat, 
							 u.ap_mat, 
							 d.departamento, 
							 ul.nombres as lnombre, 
							 ul.ap_pat as lap_pat, 
							 ul.ap_mat as lap_mat 
							 FROM usuarios u 
							 INNER JOIN permisos p
							 ON p.id_usuario = u.id_usuario
							 INNER JOIN departamento d
							 ON d.id_departamento = p.id_departamento
							 INNER JOIN usuarios ul ON ul.id_usuario = d.id_usuario
							 WHERE u.id_usuario=".$_SESSION['id_usuario'];
			
			$resQuery = mysqli_query($this->con,$query);
			
			while($row=mysqli_fetch_assoc($resQuery)){
				$data['nombre_lider'] = $row["lnombre"]." ".$row["lap_pat"]." ".$row["lap_mat"];
				$data['departamento'] = $row["departamento"];
			}
			
			return $data;
		}

		public function getProducto($codigo) {
			$query = "SELECT p.producto, 
							 p.id_producto, 
							 c.categoria 
							 FROM productos p 
							 INNER JOIN categorias c 
							 ON c.id_categoria = p.id_categoria 
							 WHERE codigo_producto ='".$codigo."'";
			
			$resQuery = mysqli_query($this->con,$query);
			
			if(mysqli_num_rows($resQuery)> 0){
				while($row=mysqli_fetch_assoc($resQuery)){
					$data['producto']    = $row['producto'];
					$data['categoria'] 	 = $row['categoria'];
					$data['id_producto'] = $row['id_producto'];
				}
			} else {
				$data['msg_producto'] = "No se encontraron productos";
			}
			
			return $data;
		}

		public function actualizarFolio($data){
			$query = "UPDATE folios SET numero_folio =".$data." WHERE id_folio = 1";
			
			$resQuery = mysqli_query($this->con, $query);
		}

		public function guardarSolicitud($data){
			$query = "INSERT INTO solicitudes(folio,
											  id_usuario,
											  id_producto,
											  cantidad,
											  descripcion,
											  id_urgencia,
											  fecha_creacion,
											  id_status) 
											  VALUES('".$data["folio"]."', 
											 		 '".$_SESSION["id_usuario"]."',
													 '".$data["id_producto"]."',
													  ".$data["cantidad"].",
													 '".$data["descripcion"]."',
													 '".$data["urgencia"]."',
													 '".$data["fecha"]."',
													 3)";
			$resQuery = mysqli_query($this->con, $query);

			if(!$resQuery){
				return FALSE;
			} else {
				return TRUE;
			}
		}

		public function getSolicitudes(){
			$query = "SELECT s.folio, s.fecha_creacion, s.id_urgencia, st.status 
					FROM solicitudes s
					LEFT JOIN usuarios u
					ON u.id_usuario = s.id_usuario
					LEFT JOIN productos p 
					ON p.id_producto = s.id_producto
					LEFT JOIN status st 
					ON st.id_status = s.id_status
					WHERE s.id_usuario=".$_SESSION['id_usuario'];

			$resQuery = mysqli_query($this->con, $query);
			if(mysqli_num_rows($resQuery)>0){
				$i= 0;
				while($row = mysqli_fetch_assoc($resQuery)){
					$data['folio'][$i]    = $row['folio'];
					$data['fecha'][$i]    = $row['fecha_creacion']; 
					$data['status'][$i]   = $row['status']; 
					$data['urgencia'][$i] = $row['id_urgencia'];
					$i++;
				}
			} else {
				$data['ms_solicitud'] = "No se encontraron solicitudes";
			}
			
			return $data;
		}

    }
?>