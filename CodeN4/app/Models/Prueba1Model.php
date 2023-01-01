<?php
namespace App\Models;

use CodeIgniter\Model;

class Prueba1Model extends Model {
    protected $table = "departamento";
    protected $primaryKey = "id_departamento";
    protected $returnType = "array";
    protected  $useSoftDeletes = false;
    protected $allowedFields = ["departamento", "id_usuario"];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function departamentosUsuarios(){
        $builder = $this->db->table("departamento d");
        $builder->join("usuarios u","u.id_usuario = d.id_usuario");
        $query = $builder->get();
        return $query->getResult();
    }
    
}

