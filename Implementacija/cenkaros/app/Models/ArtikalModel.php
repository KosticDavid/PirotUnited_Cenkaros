<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Klasa koja predstavlja tabelu artikal u bazi
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class ArtikalModel extends Model
{
    
    /**
     * @var string $table Naziv tabele
     */
    protected $table      = 'artikal';
    /**
     * @var string $primaryKey Naziv primarnog kljuca
     */
    protected $primaryKey = 'idArtikla';
    /**
     * @var string $returnType Povratni tip
     */
    protected $returnType = 'object';
    /**
     * @var string $allowedFields Kolone sa dozvolom promene
     */
    protected $allowedFields = ['naziv','jedinicaMere','tags'];
    
    /**
    * Pretraga po idArtikla
    *
    * @param integer $idA idArtikla
    *
    * @return object[]
    *
    */
    public function pretraga_idA($idA)
    {
        return $this->whereNotIn('idArtikla', $idA)->findAll();
    }
    
    /**
    * Pretraga po tagovima
    *
    * @param string $tags Query
    *
    * @return object[]
    *
    */
    public function pretraga_tags($tags)
    {
        return $this->like('tags', $tags)->findAll();
    }
        
}

