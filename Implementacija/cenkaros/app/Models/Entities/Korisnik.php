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
     * @var bool
     *
     * @ORM\Column(name="tipKorisnika", type="boolean", nullable=false)
     */
    private $tipkorisnika;


}
