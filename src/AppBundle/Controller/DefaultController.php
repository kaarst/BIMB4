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
     * @Route("/home/inkoper", name="inkoperhome")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('homes/inkoper.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }



}

?>
