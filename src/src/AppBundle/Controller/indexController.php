<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Sale;
use AppBundle\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;


class indexController extends Controller {

    /**
    * 
    */
    public function indexAction() {
             
        return $this->render('AppBundle:index:accueil.html.twig', array(
            'form'=> $form->createView(),
        ));
    }
}
