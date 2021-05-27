<?php namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
        protected $table      = 'korisnik';
        protected $primaryKey = 'idKorisnik';
        protected $returnType = 'object';
        protected $allowedFields = ['kIme','sifra','email','tipKorisnika'];
        
        public function pretraga_kIme($kIme) {
            return $this->like('kIme', $kIme)->findAll();
        }
        
        public function pretraga_email($email) {
            return $this->like('email', $email)->findAll();
        }
        
        function pretrazi_tip($tip)
        {
            return $this->like('tipKorisnika', $tip)->findAll();
        }
        
}

