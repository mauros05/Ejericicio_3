<?php 
    require_once "config/Config.php";
    
	class comprasController {
        public function __construct(){
            require_once "models/ComprasModel.php";
			$this->ComprasModel = new ComprasModel();
        }

        public function crearSolicitud($codigoProducto = NULL){
			$data['Titulo']  = 'Crear Solicitud';
			$resFolio		 = $this->ComprasModel->getFolio();
			$folio 			 = date('Y')."-".$resFolio;
			$resUsuario 	 = $this->ComprasModel->getUsuario();
			if(!empty($codigoProducto['codigoProducto'])){
				$resProducto = $this->ComprasModel->getProducto($codigoProducto['codigoProducto']);
			}

			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/ComprasVista/crearSolicitud.php";
			require_once "views/Templates/Footer.php";
        }

        public function miSolicitud(){
            $data['Titulo']  = 'Mis Solicitudes';
			$resSolicitudes		 = $this->ComprasModel->getSolicitudes();

			require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/ComprasVista/miSolicitud.php";
			require_once "views/Templates/Footer.php";
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
				$this->ComprasModel->actualizarFolio($resFolio + 1);
			} else {
				$resFolio 	   = $this->ComprasModel->getFolio();
				$data['folio'] = date("Y") ."-". $resFolio;
			}

			$resProducto 	     = $this->ComprasModel->getProducto($data['codigoProducto']);
			$data["id_producto"] = $resProducto["id_producto"];
			$guardarSolicitud 	= $this->ComprasModel->guardarSolicitud($data);
			return $guardarSolicitud;
			
		}


    }
?>