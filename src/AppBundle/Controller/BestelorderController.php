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

class BestelorderController extends Controller
{
  /**
	*@route("/bestelorder/nieuw" , name="nieuwebestelorder")
	*/
	public function BestelNieuw(Request $request){
		$NieuweBestelOrder = new BestelOrder();
		$form = $this->createForm(BestelOrderType::class, $NieuweBestelOrder);

			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($NieuweBestelOrder);
				$em->flush();
				return $this->redirect($this->generateurl("nieuwebestelorder"));
			}

			return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));
	  }

}

?>
