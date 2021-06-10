<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Klasa koja predstavlja vezu prodaje u bazi
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class ProdajeModel extends Model
{
    /**
     * @var string $table Naziv tabele
     */
    protected $table      = 'prodaje';
    /**
     * @var string $primaryKey Naziv primarnog kljuca
     */
    protected $primaryKey = 'idProdaje';
    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType = 'object';
    /**
     * @var string $allowedFields Kolone sa dozvolom promene
     */
    protected $allowedFields = ['cena','idRadnje','idArtikla'];

    /**
    * Pretraga po idRadnje
    *
    * @param integer $idR idRadnje
    *
    * @return object[]
    *
    */
    public function pretraga_idR($idR) {  
        return $this->where('idRadnje', $idR)->findAll();
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
        return $this->where('idArtikla', $idA)->findAll();
    }
    
    /**
    * Pretraga po idArtikla i idRadnje
    *
    * @param integer $idA idArtikla
    * @param integer $idR idRadnje
    *
    * @return object[]
    *
    */
    public function pretraga_idA_idR($idA,$idR) {  
        return $this->where('idArtikla', $idA)->where('idRadnje',$idR)->findAll();
    }
        
}

