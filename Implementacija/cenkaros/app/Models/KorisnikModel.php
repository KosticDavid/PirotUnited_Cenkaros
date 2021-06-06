<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Klasa koja predstavlja tabelu korisnik u bazi
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class KorisnikModel extends Model
{
    /**
     * @var string $table Naziv tabele
     */
    protected $table      = 'korisnik';
    /**
     * @var string $primaryKey Naziv primarnog kljuca
     */
    protected $primaryKey = 'idKorisnik';
    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType = 'object';
    /**
     * @var string $allowedFields Kolone sa dozvolom promene
     */
    protected $allowedFields = ['kIme','sifra','email','tipKorisnika'];

    /**
    * Pretraga po korisnickom imenu
    *
    * @param string $kIme korisnicko ime
    *
    * @return object[]
    *
    */
    public function pretraga_kIme($kIme) {
        return $this->where('kIme', $kIme)->findAll();
    }

    /**
    * Pretraga po email-u
    *
    * @param string $email email
    *
    * @return object[]
    *
    */
    public function pretraga_email($email) {
        return $this->where('email', $email)->findAll();
    }

    /**
    * Pretraga po tipu korisnika
    *
    * @param integer $tip tip korisnika
    *
    * @return object[]
    *
    */
    function pretrazi_tip($tip){
        return $this->where('tipKorisnika', $tip)->findAll();
    }
        
}

