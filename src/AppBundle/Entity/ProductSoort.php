<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductSoort
 *
 * @ORM\Table(name="productsoort")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductSoortRepository")
 */
class ProductSoort
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="tid", type="integer", unique=true)
     */
    private $tid;

    /**
     * @var string
     * 
     * @ORM\Column(name="beschrijving", type="string", length=255)
     */
    private $beschrijving;

	/**
	* @var string
	* 
	* @ORM\OneToMany(targetEntity="Product", mappedBy="productsoort")
	*/
	private $producten;
		
	

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
     * Set tid
     *
     * @param integer $tid
     *
     * @return ProductSoort
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid
     *
     * @return int
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set beschrijving
     *
     * @param string $beschrijving
     *
     * @return ProductSoort
     */
    public function setBeschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    /**
     * Get beschrijving
     *
     * @return string
     */
    public function getBeschrijving()
    {
        return $this->beschrijving;
    }
}

