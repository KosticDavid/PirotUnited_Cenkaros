<?php namespace App\Models;

use CodeIgniter\Model;

//Klasa koja predstavlja tabelu radnja u bazi
class RadnjaModel extends Model
{
    //Naziv tabele koju ova klasa predstavlja
    protected $table      = 'radnja';
    //Naziv kolone primarnog kljuca u tabeli
    protected $primaryKey = 'idRadnje';
    //Povratni tip reda iz tabele(moze da bude objekat ili niz)
    protected $returnType = 'object';
    //Kolone koje smeju da se menjaju
    protected $allowedFields = ['naziv','sirina','duzina','pib','radniDani','radnoVreme','idPredstavnika'];

    //Funkcija vraca red koji ima prosledjen idKorisnika
    //I dalje vraca niz sa 0 ili 1 objektom, ne zna da je ovde 1-1
    public function pretraga_idK($idK) {  
        return $this->like('idPredstavnika', $idK)->findAll();
    }
        
}

