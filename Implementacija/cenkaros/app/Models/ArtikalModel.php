<?php namespace App\Models;

use CodeIgniter\Model;

//Klasa koja predstavlja tabelu artikal u bazi
class ArtikalModel extends Model
{
    
    //Naziv tabele koju ova klasa predstavlja
    protected $table      = 'artikal';
    //Naziv kolone primarnog kljuca u tabeli
    protected $primaryKey = 'idArtikla';
    //Povratni tip reda iz tabele(moze da bude objekat ili niz)
    protected $returnType = 'object';
    //Kolone koje smeju da se menjaju
    protected $allowedFields = ['naziv','jedinicaMere','tags'];
    
    public function pretraga_idA($idA)
    {
        return $this->whereNotIn('idArtikla', $idA)->findAll();
    }
        
}

