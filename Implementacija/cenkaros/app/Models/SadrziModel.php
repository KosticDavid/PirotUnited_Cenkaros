<?php namespace App\Models;

use CodeIgniter\Model;

//Klasa koja predstavlja vezu sadrzi u bazi
class SadrziModel extends Model
{
    //Naziv tabele koju ova klasa predstavlja
    protected $table      = 'sadrzi';
    //Naziv kolone primarnog kljuca u tabeli
    protected $primaryKey = 'idSadrzi';
    //Povratni tip reda iz tabele(moze da bude objekat ili niz)
    protected $returnType = 'object';
    //Kolone koje smeju da se menjaju
    protected $allowedFields = ['kolicina','idListe','idArtikla'];

    //Funkcija vraca sve redove koji imaju prosledjen idListe
    public function pretraga_idL($idL) {
        return $this->like('idListe', $idL)->findAll();
    }

    //Funkcija vraca sve redove koji imaju prosledjen idArtikla
    public function pretraga_idA($idA) {  
        return $this->like('idArtikla', $idA)->findAll();
    }
        
}