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

class DefaultController extends Controller

{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->renderView('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
	 /**
     * @Route("/zeg/nogeens/hallo", name="zeghallo")
     */
	 public function zegHallo(Request $request){
		 return new Response("Hallo jij daar!");
	 }

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

/**
	 * @Route("/artikel/nieuw", name="nieuwartikel")
	 */
	public function nieuwArtikel(Request $request) {
		$nieuwArtikel = new Artikel();
		$form = $this->createForm(ArtikelNieuwType::class, $nieuwArtikel);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($nieuwArtikel);
			$em->flush();
			return $this->redirect($this->generateurl("nieuwartikel"));
		}

		return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));
	}

		/**
	 * @Route("/artikel/wijzig/{artikelnummer}", name="artikelwijzigen")
	 */
	public function wijzigArtikel(Request $request, $artikelnummer) {
		$bestaandArtikel = $this->getDoctrine()->getRepository("AppBundle:Artikel")->find($artikelnummer);
		$form = $this->createForm(ArtikelType::class, $bestaandArtikel);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($bestaandArtikel);
			$em->flush();
			return $this->redirect($this->generateurl("nieuwproduct"));
		}

		return new Response($this->renderView('form.html.twig', array('form' => $form->createView())));
	}

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
    /**
    * @Route ("/artikel/alle", name="alleartikelen")
    */
    public function alleArtikelen(Request $request){
      $artikelen = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();
      $tekst = "";
       foreach($artikelen as $artikel){
         $tekst = $tekst . "Artikelnummer: " .
         $artikel->getArtikelnummer() . ",  Omschrijving: " .
         $artikel->getOmschrijving() . ",  Magazijnlocatie: " .
         $artikel->getMagazijnlocatie() . ",  Inkoopprij: " .
         $artikel->getInkoopprijs() . ",  Minimum Voorraad: " .
         $artikel->getMinimumVoorraad() . ",  Technische Specificaties: " .
         $artikel->getTechnischeSpecificaties() . ",  Aantal Voorraad: " .
         $artikel->getAantalVoorraad() . ",  Bestserie: " .
         $artikel->getBestelserie() . ".  " .
         "<br />";
       }
      return new Response($tekst);
    }

}

?>
