<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Artikel;
use AppBundle\Form\Type\ArtikelType;
use AppBundle\Form\Type\ArtikelNieuwType;

class ArtikelController extends Controller {
  /**
  * @Route("/artikel/nieuw", name="nieuwartikel")
  */
  public function nieuwArtikel(Request $request) {
  		$nieuwArtikel = new Artikel();
  		$form = $this->createForm(ArtikelNieuwType::class, $nieuwArtikel);

  		$form->handleRequest($request);
      //echo $nieuwArtikel->getMagazijnlocatie();
  		if ($form->isSubmitted() && $form->isValid()) {
  			$em = $this->getDoctrine()->getManager();
  			$em->persist($nieuwArtikel);

        //regex zorgt ervoor dat het cijfer cijfer / letter cijfer cijfer is
        $regex = '/^[0-2][0-9]\/[A-Z][0-2][0-9]$/';
        $regexMagazijn = $nieuwArtikel->getMagazijnlocatie();
        if (preg_match($regex, $regexMagazijn)) {
          $em->flush();
          return $this->redirect($this->generateurl("nieuwartikel"));
        } else {
          echo 'Het lijkt er op dat het format van de magazijnlocatie niet klopt. Voorbeeld: 01/B12';
        }

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
			if ($bestaandArtikel->getMinimumVoorraad() > $bestaandArtikel->getAantalVoorraad()){
                $bestaandArtikel->setBestelserie($bestaandArtikel->getMinimumVoorraad() - $bestaandArtikel->getAantalVoorraad());
            } else{
                $bestaandArtikel->setBestelserie(0);
            }
			$em = $this->getDoctrine()->getManager();
			$em->persist($bestaandArtikel);
			$em->flush();
			return $this->redirect($this->generateurl("nieuwproduct"));
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
         $tekst = $tekst . "test: " .
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


    /**
    * @Route ("/artikel/voorraad", name="artikelvoorraad")
    */
    public function artikelvoorraad(Request $request){
      $artikelen = $this->getDoctrine()->getRepository("AppBundle:Artikel")->findAll();
      $tekst = "";
       foreach($artikelen as $artikel){
         $tekst = $tekst .
         $artikel->getVoorverkopen() .
         "<br />";
       }
      return new Response($tekst);
    }
}

?>
