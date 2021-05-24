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
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnik")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idKorisnik", referencedColumnName="idKorisnik")
     * })
     */
    private $idkorisnik;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Artikal", mappedBy="idliste")
     */
    private $idartikla;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idartikla = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
