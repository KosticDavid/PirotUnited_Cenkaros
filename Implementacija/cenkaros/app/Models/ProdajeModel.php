<?php namespace App\Models;

use CodeIgniter\Model;

class ProdajeModel extends Model
{
        protected $table      = 'prodaje';
        protected $primaryKey = 'idProdaje';
        protected $returnType = 'object';
        protected $allowedFields = ['cena','idRadnje','idArtikla'];
        
        public function pretraga_idR($idK) {  
            return $this->like('idRadnje', $idK)->findAll();
        }
        
        public function pretraga_idA($idA) {  
            return $this->like('idArtikla', $idA)->findAll();
        }
        
}

