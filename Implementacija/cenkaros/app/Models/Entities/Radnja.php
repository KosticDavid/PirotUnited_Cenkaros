<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;
/**
 * Radnja
 *
 * @ORM\Table(name="radnja", indexes={@ORM\Index(name="R_4", columns={"idPredstavnika"})})
 * @ORM\Entity
 */
class Radnja
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRadnje", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idradnje;

    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=50, nullable=false)
     */
    private $naziv;

    /**
     * @var string
     *
     * @ORM\Column(name="sirina", type="decimal", precision=18, scale=15, nullable=false)
     */
    private $sirina;

    /**
     * @var string
     *
     * @ORM\Column(name="duzina", type="decimal", precision=18, scale=15, nullable=false)
     */
    private $duzina;

    /**
     * @var string
     *
     * @ORM\Column(name="pib", type="string", length=20, nullable=false)
     */
    private $pib;

    /**
     * @var bool
     *
     * @ORM\Column(name="radniDani", type="smallint", nullable=false)
     */
    private $radnidani;

    /**
     * @var string
     *
     * @ORM\Column(name="radnoVreme", type="string", length=100, nullable=false)
     */
    private $radnovreme;

    /**
     * @var \App\Models\Entities\Korisnik
     *
     * @ORM\OneToOne(targetEntity="App\Models\Entities\Korisnik")
     * @ORM\JoinColumn(name="idPredstavnika", referencedColumnName="idKorisnik")
     */
    private $idpredstavnika;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Prodaje", mappedBy="idRadnje")
     */
    private $idProdaja;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProdaja = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idradnje.
     *
     * @return int
     */
    public function getIdradnje()
    {
        return $this->idradnje;
    }

    /**
     * Set naziv.
     *
     * @param string $naziv
     *
     * @return Radnja
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
     * Set sirina.
     *
     * @param string $sirina
     *
     * @return Radnja
     */
    public function setSirina($sirina)
    {
        $this->sirina = $sirina;

        return $this;
    }

    /**
     * Get sirina.
     *
     * @return string
     */
    public function getSirina()
    {
        return $this->sirina;
    }

    /**
     * Set duzina.
     *
     * @param string $duzina
     *
     * @return Radnja
     */
    public function setDuzina($duzina)
    {
        $this->duzina = $duzina;

        return $this;
    }

    /**
     * Get duzina.
     *
     * @return string
     */
    public function getDuzina()
    {
        return $this->duzina;
    }

    /**
     * Set pib.
     *
     * @param string $pib
     *
     * @return Radnja
     */
    public function setPib($pib)
    {
        $this->pib = $pib;

        return $this;
    }

    /**
     * Get pib.
     *
     * @return string
     */
    public function getPib()
    {
        return $this->pib;
    }

    /**
     * Set radnidani.
     *
     * @param int $radnidani
     *
     * @return Radnja
     */
    public function setRadnidani($radnidani)
    {
        $this->radnidani = $radnidani;

        return $this;
    }

    /**
     * Get radnidani.
     *
     * @return int
     */
    public function getRadnidani()
    {
        return $this->radnidani;
    }

    /**
     * Set radnovreme.
     *
     * @param string $radnovreme
     *
     * @return Radnja
     */
    public function setRadnovreme($radnovreme)
    {
        $this->radnovreme = $radnovreme;

        return $this;
    }

    /**
     * Get radnovreme.
     *
     * @return string
     */
    public function getRadnovreme()
    {
        return $this->radnovreme;
    }

    /**
     * Set idpredstavnika.
     *
     * @param \App\Models\Entities\Korisnik|null $idpredstavnika
     *
     * @return Radnja
     */
    public function setIdpredstavnika(\App\Models\Entities\Korisnik $idpredstavnika = null)
    {
        $this->idpredstavnika = $idpredstavnika;

        return $this;
    }

    /**
     * Get idpredstavnika.
     *
     * @return \App\Models\Entities\Korisnik|null
     */
    public function getIdpredstavnika()
    {
        return $this->idpredstavnika;
    }

    /**
     * Add idProdaja.
     *
     * @param \App\Models\Entities\Prodaja $idProdaja
     *
     * @return Radnja
     */
    public function addIdProdaja(\App\Models\Entities\Prodaje $idProdaje)
    {
        if(!($this->idProdaja->contains($idProdaja)))
        {
            $this->idProdaja[] = $idProdaja;
            $idProdaja->setIdRadnje($this);
        }
        return $this;
    }

    /**
     * Remove idProdaja.
     *
     * @param \App\Models\Entities\Prodaja $idProdaja
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdProdaja(\App\Models\Entities\Prodaje $idProdaja)
    {
        if($this->idProdaja->contains($idProdaja))
        {
            if($idProdaja->getIdRadnje()==$this) $idProdaja->setIdRadnje(null);
            return $this->idProdaja->removeElement($idProdaja);
        }
    }

    /**
     * Get idProdaja.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdProdaja()
    {
        return $this->idProdaja;
    }
}
