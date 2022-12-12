<?php 
    require_once "config/Config.php";
    
	class comprasController {
        public function __construct(){
            require_once "models/ComprasModel.php";
			$this->ComprasModel = new ComprasModel();
        }

        public function crearSolicitud($codigoProducto = NULL){
			$data['Titulo']  = 'Crear Solicitud';
			$data['urlJquery'] = 'assets/js/crearSolicitudes.js';
			
			$resFolio		 = $this->ComprasModel->getFolio();
			$folio 			 = date('Y')."-".$resFolio;
			$resUsuario 	 = $this->ComprasModel->getUsuario();
			

			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/ComprasVista/crearSolicitud.php";
			require_once "views/Templates/Footer.php";
        }

		public function buscarProducto($codigo){
			$resProducto = $this->ComprasModel->getProducto($codigo);
		
			echo json_encode($resProducto);
			exit;
		}

        public function miSolicitud(){
            $data['Titulo']  = 'Mis Solicitudes';
			$resSolicitudes		 = $this->ComprasModel->getSolicitudes();
			$data['urlJquery'] = 'assets/js/misSolicitudes.js';

			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/ComprasVista/miSolicitud.php";
			require_once "views/Templates/Footer.php";
        }

		public function buscarSolicitud($id){
			$resSolicitud = $this->ComprasModel->getSolicitd($id);
			echo json_encode($resSolicitud);
		}

        public function verSolicitud(){
            $data['Titulo']  = 'Ver Solicitud';

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

			$resProducto 	     = $this->ComprasModel->getProducto($data['codigoProducto']);
			
			$data["id_producto"] = $resProducto["id_producto"];
			
			$guardarSolicitud 	= $this->ComprasModel->guardarSolicitud($data);
			
			if ($guardarSolicitud == TRUE) {
				if (isset($bandera)) {
					$mensaje = "Registro Correcto, su folio es: " .$data['folio'];
					echo json_encode($mensaje);
				} else {
					echo json_encode("Registro Correcto");
				}
			}
			
		}


    }
?>