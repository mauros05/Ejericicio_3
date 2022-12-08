<?php 
	class Connect {		
		public function conexion() {
			$db = mysqli_connect('localhost', 'root', '', 'mentoring');
			if(!$db) {
				echo 'Hubo un error en la conexion';
			}
			return $db;
		}
	}
?>