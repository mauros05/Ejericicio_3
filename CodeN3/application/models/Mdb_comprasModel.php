<?php

use Illuminate\Cache\RateLimiting\Limit;

    class Mdb_comprasModel extends CI_Model {
        public function departamentos(){
            $this->db->select("*");
            $this->db->from("departamento d");
            $this->db->join("usuarios u", "d.id_usuario = u.id_usuario");
            // $this->db->where("d.id_usuario >", "1");
            // $this->db->order_by('d.id_usuario', 'DESC');
            // $this->db->limit(2);
            $res = $this->db->get();
            // print_r($this->db->last_query()); // muestra el query
            return $res->result(); // array de resultados con result, en caso de buscar un solo departamento debemos de usar row
        }
    }
