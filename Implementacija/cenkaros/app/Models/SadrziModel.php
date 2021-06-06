<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Klasa koja predstavlja vezu sadrzi u bazi
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class SadrziModel extends Model
{
    /**
     * @var string $table Naziv tabele
     */
    protected $table      = 'sadrzi';
    /**
     * @var string $primaryKey Naziv primarnog kljuca
     */
    protected $primaryKey = 'idSadrzi';
    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType = 'object';
    /**
     * @var string $allowedFields Kolone sa dozvolom promene
     */
    protected $allowedFields = ['kolicina','idListe','idArtikla'];

    /**
    * Pretraga po idListe
    *
    * @param integer $idL idListe
    *
    * @return object[]
    *
    */
    public function pretraga_idL($idL) {
        return $this->like('idListe', $idL)->findAll();
    }

    /**
    * Pretraga po idArtikla
    *
    * @param integer $idA idArtikla
    *
    * @return object[]
    *
    */
    public function pretraga_idA($idA) {  
        return $this->like('idArtikla', $idA)->findAll();
    }
        
}