<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Korisnik
 *
 * @ORM\Table(name="korisnik")
 * @ORM\Entity
 */
class Korisnik
{
    /**
     * @var int
     *
     * @ORM\Column(name="idKorisnik", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idkorisnik;

    /**
     * @var string
     *
     * @ORM\Column(name="kIme", type="string", length=50, nullable=false)
     */
    private $kime;

    /**
     * @var string
     *
     * @ORM\Column(name="sifra", type="string", length=64, nullable=false, options={"fixed"=true})
     */
    private $sifra;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var smallint
     *
     * @ORM\Column(name="tipKorisnika", type="smallint", nullable=false)
     */
    private $tipkorisnika;

    /**
     * @var \App\Models\Entities\Radnja
     *
     * @ORM\OneToOne(targetEntity="App\Models\Entities\Radnja",mappedBy="idpredstavnika")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idKorisnik", referencedColumnName="idPredstavnika")
     * })
     */
    private $idpredstavnika;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Lista",mappedBy="idkorisnik")
     */
    private $idlista;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idlista = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idkorisnik.
     *
     * @return int
     */
    public function getIdkorisnik()
    {
        return $this->idkorisnik;
    }

    /**
     * Set kime.
     *
     * @param string $kime
     *
     * @return Korisnik
     */
    public function setKime($kime)
    {
        $this->kime = $kime;

        return $this;
    }

    /**
     * Get kime.
     *
     * @return string
     */
    public function getKime()
    {
        return $this->kime;
    }

    /**
     * Set sifra.
     *
     * @param string $sifra
     *
     * @return Korisnik
     */
    public function setSifra($sifra)
    {
        $this->sifra = $sifra;

        return $this;
    }

    /**
     * Get sifra.
     *
     * @return string
     */
    public function getSifra()
    {
        return $this->sifra;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return Korisnik
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set tipkorisnika.
     *
     * @param int $tipkorisnika
     *
     * @return Korisnik
     */
    public function setTipkorisnika($tipkorisnika)
    {
        $this->tipkorisnika = $tipkorisnika;

        return $this;
    }

    /**
     * Get tipkorisnika.
     *
     * @return int
     */
    public function getTipkorisnika()
    {
        return $this->tipkorisnika;
    }

    /**
     * Set idpredstavnika.
     *
     * @param \App\Models\Entities\Radnja|null $idpredstavnika
     *
     * @return Korisnik
     */
    public function setIdpredstavnika(\App\Models\Entities\Radnja $idpredstavnika = null)
    {
        $this->idpredstavnika = $idpredstavnika;

        return $this;
    }

    /**
     * Get idpredstavnika.
     *
     * @return \App\Models\Entities\Radnja|null
     */
    public function getIdpredstavnika()
    {
        return $this->idpredstavnika;
    }

    /**
     * Add idlistum.
     *
     * @param \App\Models\Entities\Lista $idlistum
     *
     * @return Korisnik
     */
    public function addIdlistum(\App\Models\Entities\Lista $idlistum)
    {
       if(!$this->idlista->contains($idlistum)){
           $this->idlista[] = $idlistum;
           $idlistum->setIdkorisnik($this);
       }
       return $this;
    }

    /**
     * Remove idlistum.
     *
     * @param \App\Models\Entities\Lista $idlistum
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdlistum(\App\Models\Entities\Lista $idlistum)
    {
        if($this->idlista->contains($idlistum))
        {
            if($idlistum->getIdkorisnik() == $this)
                $idlistum->setIdkorisnik(null);
            return $this->idlista->removeElement($idlistum);
        }
        return false;
    }

    /**
     * Get idlista.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdlista()
    {
        return $this->idlista;
    }
}
