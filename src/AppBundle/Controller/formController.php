<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Sale;
use AppBundle\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;

class formController extends Controller {
              
     /**
     * @Route("/index", name="homepage")
     */
    public function addAction(Request $request)
    {
        $sale = new Sale();
        $form = $this->createForm(\AppBundle\Form\SaleType::class, $sale);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
//            $form->getData();
//            $this->getSession()->set('email', $email);
            
        return $this->render('AppBundle:index:tickets.html.twig', array(
                'form' => $form->createView(),
            ));

        }
        return $this->render('AppBundle:index:accueil.html.twig', array(
                'form' => $form->createView(),
            ));

    }

    /**
     * 
     * @Route ("\ticket", name="showTickets")
     */
    public function showTickets(Request $request)
    {
        $sale = new Sale();
        $form1 = $this->createForm(\AppBundle\Form\SaleType::class, $sale);
        
//        $form->getData();
//        $this->getSession()->set('email');
        $form1->handleRequest($request);
            if ($form1->isSubmitted() && $form1->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($sale);
                $em->flush();
            return $this->render('AppBundle:index:paiement.html.twig');
            }
        return $this->render('AppBundle:index:tickets.html.twig', array(
                'form' => $form->createView(),
            ));

    }
   
}
