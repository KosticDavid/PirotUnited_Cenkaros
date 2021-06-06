<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Klasa koja predstavlja tabelu lista u bazi
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class ListaModel extends Model
{
    /**
     * @var string $table Naziv tabele
     */
    protected $table      = 'lista';
    /**
     * @var string $primaryKey Naziv primarnog kljuca
     */
    protected $primaryKey = 'idListe';
    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType = 'object';
    /**
     * @var string $allowedFields Kolone sa dozvolom promene
     */
    protected $allowedFields = ['naziv','idKorisnik'];

    /**
    * Pretraga po idKorisnika
    *
    * @param integer $idK idKorisnika
    *
    * @return object[]
    *
    */
    public function pretraga_idK($idK) {
        return $this->like('idKorisnik', $idK)->findAll();
    }
        
}

