<?php
    require_once "config/Config.php";
    class jqueryController {
        public function __construct(){}

        public function jquery(){
            $data['Titulo']    = 'jquery';
            $data['urlJquery'] = 'assets/js/jquery.js';
           
            require_once "views/Templates/Header.php";
			require_once "views/Templates/Navbar.php";
			require_once "views/jquery.php";
			require_once "views/Templates/Footer.php";
        }

}



?>



           