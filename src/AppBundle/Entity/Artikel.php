<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artikel
 *
 * @ORM\Table(name="artikel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtikelRepository")
 */
class Artikel
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="Artikelnummer", type="integer", unique=true)
     */
    private $artikelnummer;

    /**
    * @var int
    *
    *@ORM\OneToMany(targetEntity="BestelRegel", mappedBy="artikel")
    */

    private $bestelregels;

    /**
     * @var string
     *
     * @ORM\Column(name="Omschrijving", type="string", length=255)
     */
    private $omschrijving;

    /**
     * @var string
     *
     * @ORM\Column(name="TechnischeSpecificaties", type="string", length=255, nullable=true)
     */
    private $technischeSpecificaties;

    /**
     * @var string
     *
     * @ORM\Column(name="Magazijnlocatie", type="string", length=50, nullable=true)
     */
    private $magazijnlocatie;

    /**
     * @var string
     *
     * @ORM\Column(name="Inkoopprijs", type="decimal", precision=10, scale=0)
     */
    private $inkoopprijs;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeVervangendArtikel", type="string", length=255, nullable=true)
     */
    private $codeVervangendArtikel;

    /**
     * @var string
     *
     * @ORM\Column(name="MinimumVoorraad", type="string", length=255, nullable=true)
     */
    private $minimumVoorraad;

    /**
     * @var string
     *
     * @ORM\Column(name="AantalVoorraad", type="string", length=255, nullable=true)
     */
    private $aantalVoorraad;

    /**
     * @var int
     *
     * @ORM\Column(name="Bestelserie", type="integer", nullable=true)
     */
    private $bestelserie;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set artikelnummer
     *
     * @param integer $artikelnummer
     *
     * @return Artikel
     */
    public function setArtikelnummer($artikelnummer)
    {
        $this->artikelnummer = $artikelnummer;

        return $this;
    }

    /**
     * Get artikelnummer
     *
     * @return int
     */
    public function getArtikelnummer()
    {
        return $this->artikelnummer;

    }

    /**
     * Set BestelRegels
     *
     * @param integer $bestelregels
     *
     * @return Artikel
     */
    public function setBestelregels($bestelregels)
    {
        $this->bestelregels = $bestelregels;

        return $this;
    }

    /**
     * Get BestelRegels
     *
     * @return int
     */
    public function getBestelregels()
    {
        return $this->bestelregels;

    }
    /**
     * Set omschrijving
     *
     * @param string $omschrijving
     *
     * @return Artikel
     */
    public function setOmschrijving($omschrijving)
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /**
     * Get omschrijving
     *
     * @return string
     */
    public function getOmschrijving()
    {
        return $this->omschrijving;
    }

    /**
     * Set technischeSpecificaties
     *
     * @param string $technischeSpecificaties
     *
     * @return Artikel
     */
    public function setTechnischeSpecificaties($technischeSpecificaties)
    {
        $this->technischeSpecificaties = $technischeSpecificaties;

        return $this;
    }

    /**
     * Get technischeSpecificaties
     *
     * @return string
     */
    public function getTechnischeSpecificaties()
    {
        return $this->technischeSpecificaties;
    }

    /**
     * Set magazijnlocatie
     *
     * @param string $magazijnlocatie
     *
     * @return Artikel
     */
    public function setMagazijnlocatie($magazijnlocatie)
    {
        $this->magazijnlocatie = $magazijnlocatie;

        return $this;
    }

    /**
     * Get magazijnlocatie
     *
     * @return string
     */
    public function getMagazijnlocatie()
    {
        return $this->magazijnlocatie;
    }

    /**
     * Set inkoopprijs
     *
     * @param string $inkoopprijs
     *
     * @return Artikel
     */
    public function setInkoopprijs($inkoopprijs)
    {
        $this->inkoopprijs = $inkoopprijs;

        return $this;
    }

    /**
     * Get inkoopprijs
     *
     * @return string
     */
    public function getInkoopprijs()
    {
        return $this->inkoopprijs;
    }

    /**
     * Set codeVervangendArtikel
     *
     * @param string $codeVervangendArtikel
     *
     * @return Artikel
     */
    public function setCodeVervangendArtikel($codeVervangendArtikel)
    {
        $this->codeVervangendArtikel = $codeVervangendArtikel;

        return $this;
    }

    /**
     * Get codeVervangendArtikel
     *
     * @return string
     */
    public function getCodeVervangendArtikel()
    {
        return $this->codeVervangendArtikel;
    }

    /**
     * Set minimumVoorraad
     *
     * @param string $minimumVoorraad
     *
     * @return Artikel
     */
    public function setMinimumVoorraad($minimumVoorraad)
    {
        $this->minimumVoorraad = $minimumVoorraad;

        return $this;
    }

    /**
     * Get minimumVoorraad
     *
     * @return string
     */
    public function getMinimumVoorraad()
    {
        return $this->minimumVoorraad;
    }

    /**
     * Set aantalVoorraad
     *
     * @param string $aantalVoorraad
     *
     * @return Artikel
     */
    public function setAantalVoorraad($aantalVoorraad)
    {
        $this->aantalVoorraad = $aantalVoorraad;

        return $this;
    }

    /**
     * Get aantalVoorraad
     *
     * @return string
     */
    public function getAantalVoorraad()
    {
        return $this->aantalVoorraad;
    }

    /**
     * Set bestelserie
     *
     * @param integer $bestelserie
     *
     * @return Artikel
     */
    public function setBestelserie($bestelserie)
    {
        $this->bestelserie = $bestelserie;

        return $this;
    }

    /**
     * Get bestelserie
     *
     * @return int
     */
    public function getBestelserie()
    {
        return $this->bestelserie;
    }
}
