<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BestelOrder
 *
 * @ORM\Table(name="bestel_order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BestelOrderRepository")
 */
class BestelOrder
{
  /**
   * @var int
   *
   * @ORM\Column(name="bestelnummer", type="integer", unique=true)
    * @ORM\Id
   *
   */
  private $bestelnummer;

    /**
     * @var string
     *
     * @ORM\Column(name="leverancier", type="string", length=255)
     */
    private $leverancier;

    /**
    *@var int
    *
    *@ORM\OneToMany(targetEntity="BestelRegel", mappedBy="BestelOrder")
    */
    private $bestelregels;

    /**
     * @var string
     *
     * @ORM\Column(name="artikelnummers", type="string", length=255, unique=true)
     */
    private $artikelnummers;

    /**
     * @var int
     *
     * @ORM\Column(name="bestelhoeveelheid", type="integer")
     */
    private $bestelhoeveelheid;


    /**
     * Set leverancier
     *
     * @param string $leverancier
     *
     * @return BestelOrder
     */
    public function setLeverancier($leverancier)
    {
        $this->leverancier = $leverancier;

        return $this;
    }

    /**
     * Get leverancier
     *
     * @return string
     */
    public function getLeverancier()
    {
        return $this->leverancier;
    }

    /**
     * Set bestelregels
     *
     * @param integer $bestelregels
     *
     * @return BestelOrder
     */
    public function setBestelregels($bestelregels)
    {
        $this->bestelregels = $bestelregels;

        return $this;
    }

    /**
     * Get bestelregels
     *
     * @return int
     */
    public function getBestelregels()
    {
        return $this->BestelRegels;
    }


    /**
     * Set bestelnummer
     *
     * @param integer $bestelnummer
     *
     * @return BestelOrder
     */
    public function setBestelnummer($bestelnummer)
    {
        $this->bestelnummer = $bestelnummer;

        return $this;
    }

    /**
     * Get bestelnummer
     *
     * @return int
     */
    public function getBestelnummer()
    {
        return $this->bestelnummer;
    }

    /**
     * Set artikelnummers
     *
     * @param string $artikelnummers
     *
     * @return BestelOrder
     */
    public function setArtikelnummers($artikelnummers)
    {
        $this->artikelnummers = $artikelnummers;

        return $this;
    }

    /**
     * Get artikelnummers
     *
     * @return string
     */
    public function getArtikelnummers()
    {
        return $this->artikelnummers;
    }

    /**
     * Set bestelhoeveelheid
     *
     * @param integer $bestelhoeveelheid
     *
     * @return BestelOrder
     */
    public function setBestelhoeveelheid($bestelhoeveelheid)
    {
        $this->bestelhoeveelheid = $bestelhoeveelheid;

        return $this;
    }

    /**
     * Get bestelhoeveelheid
     *
     * @return int
     */
    public function getBestelhoeveelheid()
    {
        return $this->bestelhoeveelheid;
    }
}
