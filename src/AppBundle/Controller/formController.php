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
use AppBundle\Service\BookingManager;
use Doctrine\ORM\EntityManagerInterface;


class formController extends Controller {
              
     /**
     * @Route("/index", name="home")
     */
    public function addAction(Request $request)
    {
        $sale = new Sale();
        $form = $this->createForm(\AppBundle\Form\SaleType::class, $sale);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

        return $this->render('AppBundle:index:accueil.html.twig', array(
                'form' => $form->createView(),
            ));
    }
    /**
    * @Route("/commande", name="commande")
    */
    public function addCommand(Request $request)
    {
        $sale = new Sale();
        $form = $this->createForm(\AppBundle\Form\SaleType::class, $sale);
        $ticket = new Ticket();
        $formulaire = $this->createForm(\AppBundle\Form\TicketType::class, $ticket);      
        $form->handleRequest($request);
        $booking = $this->get('AppBundle\Service\BookingManager');
      
    

        if($form->isSubmitted() && $form->isValid()){

        $booking->initBooking();
//          

        return $this->render('AppBundle:index:tickets.html.twig', array(
                'form' => $form->createView(),
                'formulaire' => $formulaire->createView(),
            ));

        }
        return $this->render('AppBundle:index:accueil.html.twig', array(
                'form' => $form->createView(),
            ));
    }
    /**
     * 
     * @Route ("/ticket", name="showtickets")
     */
    public function showTickets(Request $request)
    {
        $sale = new Sale();
        $form = $this->createForm(\AppBundle\Form\SaleType::class, $sale);
        $ticket = new Ticket();
        $formulaire = $this->createForm(\AppBundle\Form\TicketType::class, $ticket);
        
        $formulaire->handleRequest($request);     
////        $form->getData();
////        $formulaire->getData();
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($sale);
//                $this->getSession()->set('id');
                $em->persist($ticket);
                $em->flush();
            return $this->render('AppBundle:order:paiement.html.twig');
            }
        return $this->render('AppBundle:index:tickets.html.twig', array(
                'form' => $form->createView(),
                'formulaire' => $formulaire->createView(),
            ));

    }
   
}