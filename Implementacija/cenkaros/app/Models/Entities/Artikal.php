<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artikal
 *
 * @ORM\Table(name="artikal")
 * @ORM\Entity
 */
class Artikal
{
    /**
     * @var int
     *
     * @ORM\Column(name="idArtikla", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idartikla;

    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=50, nullable=false)
     */
    private $naziv;

    /**
     * @var string
     *
     * @ORM\Column(name="jedinicaMere", type="string", length=5, nullable=false)
     */
    private $jedinicamere;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=400, nullable=false)
     */
    private $tags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Prodaje", mappedBy="idartikla")
     */
    private $idprodaje;

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
        $this->idprodaje = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idsadrzi = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idartikla.
     *
     * @return int
     */
    public function getIdartikla()
    {
        return $this->idartikla;
    }

    /**
     * Set naziv.
     *
     * @param string $naziv
     *
     * @return Artikal
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
     * Set jedinicamere.
     *
     * @param string $jedinicamere
     *
     * @return Artikal
     */
    public function setJedinicamere($jedinicamere)
    {
        $this->jedinicamere = $jedinicamere;

        return $this;
    }

    /**
     * Get jedinicamere.
     *
     * @return string
     */
    public function getJedinicamere()
    {
        return $this->jedinicamere;
    }

    /**
     * Set tags.
     *
     * @param string $tags
     *
     * @return Artikal
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags.
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add idprodaje.
     *
     * @param \App\Models\Entities\Prodaje $idprodaje
     *
     * @return Artikal
     */
    public function addIdprodaje(\App\Models\Entities\Prodaje $idprodaje)
    {
        
        if(!($this->idProdaja->contains($idProdaja)))
        {
            $this->idProdaja[] = $idProdaja;
            $idProdaja->setIdArtikla($this);
        }

        return $this;
    }

    /**
     * Remove idprodaje.
     *
     * @param \App\Models\Entities\Prodaje $idprodaje
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdprodaje(\App\Models\Entities\Prodaje $idprodaje)
    {
        if($this->idProdaja->contains($idProdaja))
        {
            if($idProdaja->getIdArtikla()==$this) $idProdaja->setIdArtikla(null);
            return $this->idprodaje->removeElement($idprodaje);
        }
    }

    /**
     * Get idprodaje.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdprodaje()
    {
        return $this->idprodaje;
    }

    /**
     * Add idsadrzi.
     *
     * @param \App\Models\Entities\Sadrzi $idsadrzi
     *
     * @return Artikal
     */
    public function addIdsadrzi(\App\Models\Entities\Sadrzi $idsadrzi)
    {
        
        if(!($this->idsadrzi->contains($idsadrzi)))
        {
            $this->idsadrzi[] = $idsadrzi;
            $idsadrzi->setIdArtikla($this);
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
        if($this->idProdaja->contains($idProdaja))
        {
            if($idsadrzi->getIdArtikla()==$this) $idsadrzi->setIdArtikla(null);
            return $this->idsadrzi->removeElement($idsadrzi);
        }
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
