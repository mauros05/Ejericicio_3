<?php 
    require_once "config/Config.php";
    
	class comprasController {
        public function __construct(){
            require_once "models/ComprasModel.php";
			$this->ComprasModel = new ComprasModel();
        }

        public function crearSolicitud($codigoProducto = NULL){
			$data['Titulo']    = 'Crear Solicitud';
			$data['urlJquery'] = 'assets/js/crearSolicitudes.js';
			
			$resFolio		 = $this->ComprasModel->getFolio();
			$folio 			 = date('Y')."-".$resFolio;
			
			$resUsuario 	 = $this->ComprasModel->getUsuario();
			
			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/ComprasVista/crearSolicitud.php";
			require_once "views/Templates/Footer.php";
        }

		public function buscarProducto($codigo = NULL, $id_producto = NULL){
			if($codigo!=NULL){
				$resProducto = $this->ComprasModel->getProducto($codigo);
				echo json_encode($resProducto);
				exit;
			} else {
				$resProducto = $this->ComprasModel->getProducto(NULL, $id_producto);
				
				return $resProducto;
			}
		}

        public function miSolicitud(){
            $data['Titulo']    = 'Mis Solicitudes';
			$data['urlJquery'] = 'assets/js/misSolicitudes.js';
			
			$resSolicitudes	 = $this->ComprasModel->getSolicitudes();

			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/ComprasVista/miSolicitud.php";
			require_once "views/Templates/Footer.php";
        }

		public function buscarSolicitud($id){
			$resSolicitud = $this->ComprasModel->getSolicitd($id);
			
			$prod = json_decode($resSolicitud["id_producto"]);
			
			$res = NULL;
			
			if(is_object($prod)){
				$id_prod = explode(',', $prod->id_producto);
				foreach($id_prod as $idp){
					$res[] = $this->ComprasModel->getProducto(NULL, $idp);
				}
				$resSolicitud["productos_res"] = $res;
			} elseif (is_array($prod)){
				$resSolicitud["productos_res_arr"] = $resSolicitud["id_producto"];
			}
			
			echo json_encode($resSolicitud);
		}

        public function verSolicitud(){
            $data['Titulo']  = 'Ver Solicitud';

			$resSolicitudes	 = $this->ComprasModel->verMisSolicitudes();

			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/ComprasVista/verSolicitud.php";
			require_once "views/Templates/Footer.php";
        }

		public function guardarSolicitud($data){
			$folio    = explode("-", $data["folio"]);	
			$resFolio = $this->ComprasModel->getFolio();
			
			if($folio[1] == $resFolio) {
				$this->ComprasModel->actualizarFolio($resFolio);
			} else {
				$resFolio 	   = $this->ComprasModel->getFolio();
				$data['folio'] = date("Y")."-".$resFolio;
				$this->ComprasModel->actualizarFolio($resFolio);
				$bandera = 1;
			}

			$arregloProductos=[];
			for($i=0; $i < count($data['codigoProducto']) ; $i++){
				$resProducto=$this->ComprasModel->getProducto($data['codigoProducto'][$i]);
				$idProducto=$resProducto['id_producto'];
				$arregloDatos=array(
									'id_producto'=>$idProducto,
									'nomProducto'=> $data['nomProducto'][$i],
									'categoria'=>$data['categoria'][$i],
									'cantidad'=>$data['cantidad'][$i],
									'codigo_producto'=>$data['codigoProducto'][$i]
									);
				array_push($arregloProductos,$arregloDatos);
			}

			
			$data["id_producto"] = json_encode($arregloProductos,true);
			$data["cantidad"] = '';
			
			$guardarSolicitud 	 = $this->ComprasModel->guardarSolicitud($data);
			
			if ($guardarSolicitud == TRUE) {
				if (isset($bandera)) {
					$mensaje = "Registro Correcto, su folio es: ".$data['folio'];
					echo json_encode($mensaje);
				} else {
					echo json_encode("Registro Correcto");
				}
			}

			// FORMA 1 - SERGIO
			// $cadena   = '';
			// $cantidad = '';

			// foreach($data["codigoProducto"] as $i => $codigo){
			// 	$resProducto = $this->ComprasModel->getProducto($codigo);
			// 	$cadena.=$resProducto["id_producto"].',';
			// 	$cantidad.=$data["cantidad"][$i].',';
			// }

			// $productos  = substr($cadena, 0, -1 );
			// $cantidades = substr($cantidad, 0, -1 );
			
		}

		public function cancelarSolicitud($id) {
			$resSolicitud = $this->ComprasModel->cancelarSolicitud($id);
			echo json_encode($resSolicitud);
			exit;
		}


    }
?>