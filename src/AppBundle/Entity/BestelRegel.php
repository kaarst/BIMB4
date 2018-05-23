<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
*
* @ORM\ManyToOne(targetEntity="Artikel", inversedBy="bestelregels")
* @ORM\JoinColumn(name="artikelnummer", referencedColumnName="artikelnummer")
*/
class BestelRegel
  {



     private $Artikel;

     private $BestelOrder;



     /**
      * Set artikel
      *
      * @param string $artikel
      *
      * @return BestelRegel
      */
     public function setArtikel($Artikel)
     {
         $this->Artikel = $Artikel;

         return $this;
     }

     /**
      * Get artikel
      *
      * @return string
      */
     public function getArtikel()
     {
         return $this->artikel;
     }


     /**
      * Set bestelorder
      *
      * @param string $BestelOrder
      *
      * @return BestelRegel
      */
     public function seBestelOrder($BestelOrder)
     {
         $this->bestelorder = $BestelOrder;

         return $this;
     }

     /**
      * Get BestelOrder
      *
      * @return string
      */
     public function getBestelOrder()
     {
         return $this->BestelOrder;
     }

}



?>
