<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prodaje
 *
 * @ORM\Table(name="prodaje")
 * @ORM\Entity
 */
class Prodaje
{
    /**
     * @var App\Models\Entities\Artikal
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Artikal")
     * @ORM\JoinColumn(name="idArtikla", referencedColumnName="idArtikla")
     * @ORM\Id
     */
    private $idartikla;
    
    /**
     * @var App\Models\Entities\Radnja
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Radnja")
     * @ORM\JoinColumn(name="idRadnje", referencedColumnName="idRadnje")
     * @ORM\Id
     */
    private $idradnje;

    /**
     * @var decimal
     *
     * @ORM\Column(name="cena", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $cena;


    /**
     * Set idartikla.
     *
     * @param \App\Models\Entities\Artikal $idartikla
     *
     * @return Prodaje
     */
    public function setIdArtikla($idartikla)
    {
        $this->idartikla = $idartikla;

        return $this;
    }

    /**
     * Get idartikla.
     *
     * @return \App\Models\Entities\Artikal
     */
    public function getIdArtikla()
    {
        return $this->idartikla;
    }

    /**
     * Set idradnje.
     *
     * @param \App\Models\Entities\Radnja $idradnje
     *
     * @return Prodaje
     */
    public function setIdRadnje($idradnje)
    {
        $this->idradnje = $idradnje;

        return $this;
    }

    /**
     * Get idradnje.
     *
     * @return \App\Models\Entities\Radnja
     */
    public function getIdRadnje()
    {
        return $this->idradnje;
    }

    /**
     * Set cena.
     *
     * @param decimal $cena
     *
     * @return Prodaje
     */
    public function setCena($cena)
    {
        $this->cena = $cena;

        return $this;
    }

    /**
     * Get cena.
     *
     * @return decimal
     */
    public function getCena()
    {
        return $this->cena;
    }
}
