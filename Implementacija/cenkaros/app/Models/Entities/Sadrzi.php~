<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sadrzi
 *
 * @ORM\Table(name="sadrzi")
 * @ORM\Entity
 */
class Sadrzi
{
    /**
     * @var \App\Models\Entities\Artikal
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Artikal",inversedBy="idartikla")
     * @ORM\JoinColumn(name="idArtikla", referencedColumnName="idArtikla")
     * @ORM\Id
     */
    private $idartikla;
    
    /**
     * @var App\Models\Entities\Lista
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Lista",inversedBy="idsadrzi")
     * @ORM\JoinColumn(name="idListe", referencedColumnName="idListe")
     * @ORM\Id
     */
    private $idliste;

    /**
     * @var decimal
     *
     * @ORM\Column(name="kolicina", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $kolicina;


    /**
     * Set kolicina.
     *
     * @param string $kolicina
     *
     * @return Sadrzi
     */
    public function setKolicina($kolicina)
    {
        $this->kolicina = $kolicina;

        return $this;
    }

    /**
     * Get kolicina.
     *
     * @return string
     */
    public function getKolicina()
    {
        return $this->kolicina;
    }

    /**
     * Set idartikla.
     *
     * @param \App\Models\Entities\Artikal $idartikla
     *
     * @return Sadrzi
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
     * Set idliste.
     *
     * @param \App\Models\Entities\Lista $idliste
     *
     * @return Sadrzi
     */
    public function setIdliste(\App\Models\Entities\Lista $idliste)
    {
        $this->idliste = $idliste;

        return $this;
    }

    /**
     * Get idliste.
     *
     * @return \App\Models\Entities\Lista
     */
    public function getIdliste()
    {
        return $this->idliste;
    }
}
