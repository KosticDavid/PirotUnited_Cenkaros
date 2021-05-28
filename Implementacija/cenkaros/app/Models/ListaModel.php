<?php namespace App\Models;

use CodeIgniter\Model;

//Klasa koja predstavlja tabelu lista u bazi
class ListaModel extends Model
{
    //Naziv tabele koju ova klasa predstavlja
    protected $table      = 'lista';
    //Naziv kolone primarnog kljuca u tabeli
    protected $primaryKey = 'idListe';
    //Povratni tip reda iz tabele(moze da bude objekat ili niz)
    protected $returnType = 'object';
    //Kolone koje smeju da se menjaju
    protected $allowedFields = ['naziv','idKorisnika'];

    //Funkcija vraca sve redove koji imaju prosledjen idKorisnika
    public function pretraga_idK($idK) {
        return $this->like('idKorisnik', $idK)->findAll();
    }
        
}

