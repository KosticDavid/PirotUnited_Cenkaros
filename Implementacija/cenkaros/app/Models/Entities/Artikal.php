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
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Radnja", mappedBy="idartikla")
     */
    private $idradnje;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Lista", mappedBy="idartikla")
     */
    private $idliste;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idradnje = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idliste = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
