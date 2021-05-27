<?php namespace App\Models;

use CodeIgniter\Model;

class ArtikalModel extends Model
{
        protected $table      = 'artikal';
        protected $primaryKey = 'idArtikla';
        protected $returnType = 'object';
        protected $allowedFields = ['naziv','jedinicaMere','tags'];
        
}

