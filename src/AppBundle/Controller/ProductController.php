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

class ProductController extends Controller
{

/**
	 * @Route("/product/nieuw", name="nieuwproduct")
	 */
	public function nieuwProduct(Request $request) {
		$nieuwProduct = new Product();
		$form = $this->createForm(ProductType::class, $nieuwProduct);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuwProduct);
			$em->flush();
			return $this->redirect($this->generateurl("nieuwproduct"));
		}

		return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));
	}

	/**
	 * @Route("/product/wijzig/{barcode}", name="productwijzigen")
	 */
	public function wijzigProduct(Request $request, $barcode) {
		$bestaandProduct = $this->getDoctrine()->getRepository("AppBundle:Product")->find($barcode);
		$form = $this->createForm(ProductType::class, $bestaandProduct);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($bestaandProduct);
			$em->flush();
			return $this->redirect($this->generateurl("nieuwproduct"));
		}

		return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));
	}

}

?>
