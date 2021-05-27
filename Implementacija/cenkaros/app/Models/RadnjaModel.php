<?php namespace App\Models;

use CodeIgniter\Model;

class RadnjaModel extends Model
{
        protected $table      = 'radnja';
        protected $primaryKey = 'idRadnje';
        protected $returnType = 'object';
        protected $allowedFields = ['naziv','sirina','duzina','pib','radniDani','radnoVreme','idPredstavnika'];
        
        public function pretraga_idK($idK) {  
            return $this->like('idPredstavnika', $idK)->findAll();
        }
        
}

