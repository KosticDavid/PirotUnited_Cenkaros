<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lista
 *
 * @ORM\Table(name="lista", indexes={@ORM\Index(name="R_1", columns={"idKorisnik"})})
 * @ORM\Entity
 */
class Lista
{
    /**
     * @var int
     *
     * @ORM\Column(name="idListe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idliste;

    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=50, nullable=false)
     */
    private $naziv;

    /**
     * @var \App\Models\Entities\Korisnik
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnik",inversedBy="idlista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idKorisnik", referencedColumnName="idKorisnik")
     * })
     */
    private $idkorisnik;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Sadrzi", mappedBy="idartikla")
     */
    private $idsadrzi;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idsadrzi = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idliste.
     *
     * @return int
     */
    public function getIdliste()
    {
        return $this->idliste;
    }

    /**
     * Set naziv.
     *
     * @param string $naziv
     *
     * @return Lista
     */
    public function setNaziv($naziv)
    {
        $this->naziv = $naziv;

        return $this;
    }

    /**
     * Get naziv.
     *
     * @return string
     */
    public function getNaziv()
    {
        return $this->naziv;
    }

    /**
     * Set idkorisnik.
     *
     * @param \App\Models\Entities\Korisnik|null $idkorisnik
     *
     * @return Lista
     */
    public function setIdkorisnik(\App\Models\Entities\Korisnik $idkorisnik = null)
    {
        $this->idkorisnik = $idkorisnik;

        return $this;
    }

    /**
     * Get idkorisnik.
     *
     * @return \App\Models\Entities\Korisnik|null
     */
    public function getIdkorisnik()
    {
        return $this->idkorisnik;
    }

    /**
     * Add idsadrzi.
     *
     * @param \App\Models\Entities\Sadrzi $idsadrzi
     *
     * @return Lista
     */
    public function addIdsadrzi(\App\Models\Entities\Sadrzi $idsadrzi)
    {
        if(!$this->idsadrzi->contains($idsadrzi))
        {
            $this->idsadrzi[] = $idsadrzi;
            $idsadrzi->setIdliste($this);
        }
        return $this;
    }

    /**
     * Remove idsadrzi.
     *
     * @param \App\Models\Entities\Sadrzi $idsadrzi
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdsadrzi(\App\Models\Entities\Sadrzi $idsadrzi)
    {
        if($this->idsadrzi->conatains($idsadrzi))
        {
            if($idsadrzi->getIdliste() == $this)
                $idsadrzi->setIdliste(null);
            return $this->idsadrzi->removeElement($idsadrzi);
        }
        return false;
    }

    /**
     * Get idsadrzi.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdsadrzi()
    {
        return $this->idsadrzi;
    }
}
