<?php 
    class ComprasModel{
        public function __construct(){
            require_once "connect/Connect.php";
			$connect = new Connect();
			$this->con=$connect->conexion();
        }
		
		public function getFolio(){
			$query = "SELECT * 
					  FROM folios 
					  WHERE id_folio = 1"; // Query para solicitudes
			
			$resQuery = mysqli_query($this->con, $query);
			
			if(mysqli_num_rows($resQuery) > 0){
				while($row = mysqli_fetch_assoc($resQuery)){
					$folio = $row['numero_folio'] + 1;
				}
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
			
			$resQuery = mysqli_query($this->con, $query);
			
			while($row = mysqli_fetch_assoc($resQuery)){
				$data['nombre_lider'] = $row["lnombre"]." ".$row["lap_pat"]." ".$row["lap_mat"];
				$data['departamento'] = $row["departamento"];
			}
			
			return $data;
		}

		public function getProducto($codigo = NULL, $id_producto = NULL) {
			$query = "SELECT p.producto, 
							 p.id_producto, 
							 p.codigo_producto,
							 c.categoria
							 FROM productos p 
							 INNER JOIN categorias c 
							 ON c.id_categoria = p.id_categoria 
							 WHERE codigo_producto ='".$codigo."' OR id_producto ='".$id_producto."'";
			
			$resQuery = mysqli_query($this->con, $query);
			
			if(mysqli_num_rows($resQuery) > 0){
				while($row=mysqli_fetch_assoc($resQuery)){
					$data['producto']    = $row['producto'];
					$data['categoria'] 	 = $row['categoria'];
					$data['id_producto'] = $row['id_producto'];
					$data['codigo_producto'] = $row['codigo_producto'];
				}
			} else {
				$data['msg_producto'] = "No se encontraron productos";
			}
			
			return $data;
		}

		public function actualizarFolio($data){
			$query = "UPDATE folios SET numero_folio ='".$data."' WHERE id_folio = 1";
			
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
													 '".$data["cantidad"]."',
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
			$query = "SELECT s.id_solicitud, 
							 s.folio, 
							 s.fecha_creacion, 
							 s.id_urgencia, 
							 st.status, 
							 st.color
					FROM solicitudes s
					LEFT JOIN usuarios u
					ON u.id_usuario = s.id_usuario
					LEFT JOIN productos p 
					ON p.id_producto = s.id_producto
					LEFT JOIN status st 
					ON st.id_status = s.id_status
					WHERE s.id_usuario =".$_SESSION['id_usuario'];

			$resQuery = mysqli_query($this->con, $query);
			
			if(mysqli_num_rows($resQuery) > 0){
				$i= 0;
				while($row = mysqli_fetch_assoc($resQuery)){
				$data['id_solicitud'][$i] = $row['id_solicitud'];
					$data['folio'][$i]    = $row['folio'];
					$data['fecha'][$i]    = $row['fecha_creacion']; 
					$data['status'][$i]   = $row['status']; 
					$data['urgencia'][$i] = $row['id_urgencia'];
					$data['color'][$i] 	  = $row['color'];
					$i++;
				}
			} else {
				$data['ms_solicitud'] = "No se encontraron solicitudes";
			}
			
			return $data;
		}

		public function getSolicitd($id){
			$query = "SELECT s.folio,
							 s.fecha_creacion,
							 s.cantidad,
							 s.descripcion,
							 s.id_urgencia,
							 s.id_producto,
							 p.producto,
							 p.codigo_producto,
							 c.categoria,
							 st.status,
							 st.color,
							 st.id_status
					FROM solicitudes s 
					LEFT JOIN productos p
					ON s.id_producto = p.id_producto
					LEFT JOIN categorias c
					ON p.id_categoria = c.id_categoria
					INNER JOIN status st
					ON st.id_status = s.id_status 
					WHERE id_solicitud =".$id;

			$resQuery = mysqli_query($this->con, $query);

			while($row = mysqli_fetch_assoc($resQuery)){
				$data["folio"] 			 = $row["folio"];
				$data["fecha_creacion"]  = $row["fecha_creacion"];
				$data["cantidad"] 		 = $row["cantidad"];
				$data["descripcion"] 	 = $row["descripcion"];
				$data["id_urgencia"] 	 = $row["id_urgencia"];
				$data["id_producto"] 	 = $row["id_producto"];
				$data["id_status"] 	 	 = $row["id_status"];
				$data["producto"] 		 = $row["producto"];
				$data["codigo_producto"] = $row["codigo_producto"];
				$data["categoria"] 	 	 = $row["categoria"];
				$data["status"] 		 = $row["status"];
				$data["color"] 			 = $row["color"];
			}
			return $data;
		}

		public function cancelarSolicitud($id){
			$query = "UPDATE solicitudes SET id_status = 2 WHERE id_solicitud=" . $id;
			$resQuery = mysqli_query($this->con, $query);
			return $resQuery;
		}

		public function aceptarSolicitud($id){
			$query = "UPDATE solicitudes SET id_status = 4 WHERE id_solicitud=" . $id;
			$resQuery = mysqli_query($this->con, $query);
			return $resQuery;
		}

		public function verMisSolicitudes(){
			$query = "SELECT s.id_solicitud, 
							s.folio,
							u.nombres, 
							u.ap_pat, 
							u.ap_mat, 
							s.fecha_creacion, 
							s.descripcion, 
							s.id_urgencia, 
							st.status, 
							st.color,  
							pr.codigo_producto 
					FROM departamento d 
					INNER JOIN permisos p 
					ON p.id_departamento = d.id_departamento
					INNER JOIN solicitudes s 
					ON s.id_usuario =  p.id_usuario
					INNER JOIN usuarios u 
					ON u.id_usuario = s.id_usuario
					LEFT JOIN productos pr 
					ON pr.id_producto = s.id_producto
					INNER JOIN status st 
					ON st.id_status = s.id_status
					WHERE d.id_usuario =".$_SESSION["id_usuario"];

			$res = mysqli_query($this->con, $query);
			
			if(mysqli_num_rows($res) > 0){
				$i = 0;
				while($row = mysqli_fetch_assoc($res)){
					$data["id_solicitud"][$i]		 = $row["id_solicitud"];
					$data["folio"][$i] 			 = $row["folio"];
					$data["nombre"][$i] 		 = $row["nombres"]." ".$row["ap_pat"]." ".$row["ap_mat"];
					$data["fecha_creacion"][$i]  = $row["fecha_creacion"];
					$data["descripcion"][$i] 	 = $row["descripcion"];
					$data["id_urgencia"][$i] 	 = $row["id_urgencia"];
					$data["status"][$i] 	     = $row["status"];
					$data["codigo_producto"][$i] = $row["codigo_producto"];
					$data["color"][$i] 			 = $row["color"];
					$i++;
				}
			} else {
				$data["msg_error_ms"] = "No se encontraron consultas";
			}
			return $data;
		}

		public function ordenesAprobadas(){
			$query = "SELECT s.id_solicitud, 
			s.folio,
			u.nombres, 
			u.ap_pat, 
			u.ap_mat, 
			s.fecha_creacion, 
			s.descripcion, 
			s.id_urgencia,
			s.id_status,
			st.status, 
			st.color,  
			pr.codigo_producto 
				FROM departamento d 
				INNER JOIN permisos p 
				ON p.id_departamento = d.id_departamento
				INNER JOIN solicitudes s 
				ON s.id_usuario =  p.id_usuario
				INNER JOIN usuarios u 
				ON u.id_usuario = s.id_usuario
				LEFT JOIN productos pr 
				ON pr.id_producto = s.id_producto
				INNER JOIN status st 
				ON st.id_status = s.id_status
				WHERE s.id_status = 4";
			$res = mysqli_query($this->con, $query);
			
			if(mysqli_num_rows($res) > 0){
				$i = 0;
				while($row = mysqli_fetch_assoc($res)){
					$data["id_solicitud"][$i]	 = $row["id_solicitud"];
					$data["folio"][$i] 			 = $row["folio"];
					$data["nombre"][$i] 		 = $row["nombres"]." ".$row["ap_pat"]." ".$row["ap_mat"];
					$data["fecha_creacion"][$i]  = $row["fecha_creacion"];
					$data["descripcion"][$i] 	 = $row["descripcion"];
					$data["id_urgencia"][$i] 	 = $row["id_urgencia"];
					$data["status"][$i] 	     = $row["status"];
					$data["codigo_producto"][$i] = $row["codigo_producto"];
					$data["color"][$i] 			 = $row["color"];
					$data["id_status"][$i] 		 = $row["id_status"];
					$i++;
				}
			} else {
				$data["msg_error_ms"] = "No se encontraron consultas";
			}
			return $data;
		}

		public function ordenCompra($id) {
			$query = "SELECT s.id_solicitud,
							s.id_producto,
							s.folio,
							s.cantidad,
							pv.id_proveedor, 
							pv.nombre,
							pv.codigo_proveedor,
							pv.direccion, 
							p.precio, 
							c.categoria 
							FROM solicitudes s 
							LEFT JOIN productos p 
							ON s.id_producto = p.id_producto 
							LEFT JOIN proveedor pv 
							ON pv.id_proveedor = p.id_proveedor 
							LEFT JOIN categorias c ON c.id_categoria=p.id_categoria WHERE s.id_solicitud=".$id;
			$resQuery = mysqli_query($this->con, $query);
			if(mysqli_num_rows($resQuery) > 0){
				while($row = mysqli_fetch_assoc($resQuery)){
					$data['id_solicitud']	 =$row['id_solicitud'];
					$data['id_producto']	 =$row['id_producto'];
					$data['folio']			 =$row['folio'];
					$data['cantidad']		 =$row['cantidad'];
					$data['id_proveedor']	 =$row['id_proveedor'];
					$data['nombre']			 =$row['nombre'];
					$data['codigo_proveedor']=$row['codigo_proveedor'];
					$data['direccion']		 =$row['direccion'];
					$data['precio']			 =$row['precio'];
					$data['categoria']		 =$row['categoria'];
				}
			} else {
				$data["error_msg"] = "No se encontraron datos";
			}
			return $data;
		}

		public function buscarProveedor($codigo){
			$query = "SELECT * FROM proveedor WHERE codigo_proveedor ='".$codigo."'";
			$resQuery = mysqli_query($this->con, $query);
			$data["error_msg"] = NULL;
			if(mysqli_num_rows($resQuery) > 0){
				while($row = mysqli_fetch_assoc($resQuery)){
					$data['codigo_proveedor']=$row['codigo_proveedor'];
					$data['id_proveedor']	 =$row['id_proveedor'];
					$data['direccion']		 =$row['direccion'];
					$data['nombre']			 =$row['nombre'];
					$data['status']			 =$row['status'];
				}
			} else {
				$data["error_msg"] = "No se encuentra proveedor";
			}
			return $data;
		}

    }
?>