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
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Artikal")
     * @ORM\JoinColumn(name="idArtikla", referencedColumnName="idArtikla")
     * @ORM\Id
     */
    private $idartikla;
    
    /**
     * @var App\Models\Entities\Lista
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Lista")
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
     * Set idartikla.
     *
     * @param \App\Models\Entities\Artikal $idartikla
     *
     * @return Sadrzi
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
     * Set idliste.
     *
     * @param App\Models\Entities\Lista $idliste
     *
     * @return Sadrzi
     */
    public function setIdListe($idliste)
    {
        $this->idliste = $idliste;

        return $this;
    }

    /**
     * Get idliste.
     *
     * @return App\Models\Entities\Lista
     */
    public function getIdListe()
    {
        return $this->idliste;
    }

    /**
     * Set kolicina.
     *
     * @param decimal $kolicina
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
     * @return decimal
     */
    public function getKolicina()
    {
        return $this->kolicina;
    }
}
