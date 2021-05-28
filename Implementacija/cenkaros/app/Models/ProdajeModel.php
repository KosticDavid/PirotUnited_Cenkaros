<?php namespace App\Models;

use CodeIgniter\Model;

//Klasa koja predstavlja vezu prodaje u bazi
class ProdajeModel extends Model
{
    //Naziv tabele koju ova klasa predstavlja
    protected $table      = 'prodaje';
    //Naziv kolone primarnog kljuca u tabeli
    protected $primaryKey = 'idProdaje';
    //Povratni tip reda iz tabele(moze da bude objekat ili niz)
    protected $returnType = 'object';
    //Kolone koje smeju da se menjaju
    protected $allowedFields = ['cena','idRadnje','idArtikla'];

    //Funkcija vraca sve redove koji imaju prosledjen idRadnje
    public function pretraga_idR($idK) {  
        return $this->like('idRadnje', $idK)->findAll();
    }

    //Funkcija vraca sve redove koji imaju prosledjen idArtikla
    public function pretraga_idA($idA) {  
        return $this->like('idArtikla', $idA)->findAll();
    }
        
}

