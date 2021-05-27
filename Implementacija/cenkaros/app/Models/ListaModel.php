<?php namespace App\Models;

use CodeIgniter\Model;

class ListaModel extends Model
{
        protected $table      = 'lista';
        protected $primaryKey = 'idListe';
        protected $returnType = 'object';
        protected $allowedFields = ['naziv','idKorisnika'];
        
        public function pretraga_idK($idK) {
            return $this->like('idKorisnik', $idK)->findAll();
        }
        
}

