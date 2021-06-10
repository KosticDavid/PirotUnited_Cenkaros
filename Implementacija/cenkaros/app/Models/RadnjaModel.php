<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Klasa koja predstavlja tabelu radnja u bazi
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class RadnjaModel extends Model
{
    /**
     * @var string $table Naziv tabele
     */
    protected $table      = 'radnja';
    /**
     * @var string $primaryKey Naziv primarnog kljuca
     */
    protected $primaryKey = 'idRadnje';
    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType = 'object';
    /**
     * @var string $allowedFields Kolone sa dozvolom promene
     */
    protected $allowedFields = ['naziv','sirina','duzina','pib','radniDani','radnoVreme','idPredstavnika'];

    /**
    * Pretraga po idKorisnika
    *
    * @param integer $idK idKorisnika
    *
    * @return object[]
    *
    */
    public function pretraga_idK($idK) {  
        return $this->where('idPredstavnika', $idK)->findAll();
    }
        
}

