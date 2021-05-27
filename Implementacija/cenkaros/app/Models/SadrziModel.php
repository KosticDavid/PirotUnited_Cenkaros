<?php namespace App\Models;

use CodeIgniter\Model;

class SadrziModel extends Model
{
        protected $table      = 'sadrzi';
        protected $primaryKey = 'idSadrzi';
        protected $returnType = 'object';
        protected $allowedFields = ['kolicina','idListe','idArtikla'];
        
        public function pretraga_idL($idL) {
            return $this->like('idListe', $idL)->findAll();
        }
                
        public function pretraga_idA($idA) {  
            return $this->like('idArtikla', $idA)->findAll();
        }
        
}

