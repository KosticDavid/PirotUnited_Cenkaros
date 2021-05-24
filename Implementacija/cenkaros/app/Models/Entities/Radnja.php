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
     * @ORM\Column(name="radniDani", type="boolean", nullable=false)
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
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Korisnik")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPredstavnika", referencedColumnName="idKorisnik")
     * })
     */
    private $idpredstavnika;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Artikal", mappedBy="idradnje")
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
