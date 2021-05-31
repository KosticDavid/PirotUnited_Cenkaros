<?php namespace App\Models;

use CodeIgniter\Model;

//Klasa koja predstavlja tabelu korisnik u bazi
class KorisnikModel extends Model
{
    //Naziv tabele koju ova klasa predstavlja
    protected $table      = 'korisnik';
    //Naziv kolone primarnog kljuca u tabeli
    protected $primaryKey = 'idKorisnik';
    //Povratni tip reda iz tabele(moze da bude objekat ili niz)
    protected $returnType = 'object';
    //Kolone koje smeju da se menjaju
    protected $allowedFields = ['kIme','sifra','email','tipKorisnika'];

    //Funkcija vraca sve redove koji imaju prosledjeno kIme
    public function pretraga_kIme($kIme) {
        return $this->where('kIme', $kIme)->findAll();
    }

    //Funkcija vraca sve redove koji imaju prosledjen email
    public function pretraga_email($email) {
        return $this->where('email', $email)->findAll();
    }

    //Funkcija vraca sve redove koji imaju prosledjen email
    function pretrazi_tip($tip){
        return $this->where('tipKorisnika', $tip)->findAll();
    }
        
}

