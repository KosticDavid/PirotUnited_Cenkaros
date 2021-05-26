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
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Artikal",inversedBy="idprodaje")
     * @ORM\JoinColumn(name="idArtikla", referencedColumnName="idArtikla")
     * @ORM\Id
     */
    private $idartikla;
    
    /**
     * @var App\Models\Entities\Radnja
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Radnja",inversedBy="idprodaje")
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
     * Set cena.
     *
     * @param string $cena
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
     * @return string
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * Set idartikla.
     *
     * @param \App\Models\Entities\Artikal $idartikla
     *
     * @return Prodaje
     */
    public function setIdartikla(\App\Models\Entities\Artikal $idartikla)
    {
        $this->idartikla = $idartikla;

        return $this;
    }

    /**
     * Get idartikla.
     *
     * @return \App\Models\Entities\Artikal
     */
    public function getIdartikla()
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
    public function setIdradnje(\App\Models\Entities\Radnja $idradnje)
    {
        $this->idradnje = $idradnje;

        return $this;
    }

    /**
     * Get idradnje.
     *
     * @return \App\Models\Entities\Radnja
     */
    public function getIdradnje()
    {
        return $this->idradnje;
    }
}
