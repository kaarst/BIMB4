<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Klant;
use AppBundle\Form\Type\KlantType;
use AppBundle\Entity\Product;
use AppBundle\Form\Type\ProductType;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelType;
use AppBundle\Entity\BestelOrder;
use AppBundle\Form\Type\BestelOrderType;
use AppBundle\Form\Type\ArtikelNieuwType;

class KlantController extends Controller
{
	 /**
     * @Route("/alle/klanten", name="alleklanten")
     */
	 public function alleKlanten(Request $request){
		 $klanten = $this->getDoctrine()->getRepository("AppBundle:Klant")->findAll();
		 $tekst = "";
			foreach($klanten as $klant){
				$tekst = $tekst . $klant->getVoornaam() . $klant->getAchternaam() . $klant->getTelefoonnummer() . "<br />";
			}
		 return new Response($tekst);
	 }

	/**
	* @Route("/klanten/{woonplaats}", name="klantopwoonplaats")
	*/
	 public function klantOpWoonplaats(Request $request, $woonplaats){
		 $klanten = $this->getDoctrine()->getRepository("AppBundle:Klant")->findByWoonplaats($woonplaats);
		 $tekst = "";
			foreach($klanten as $klant){
				$tekst = $tekst . $klant->getVoornaam() . $klant->getAchternaam() . $klant->getTelefoonnummer() . $klant->getWoonplaats() . "<br />";
			}
		 return new Response($tekst);
	 }


}

?>
