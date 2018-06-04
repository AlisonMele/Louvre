<?php

namespace AppBundle\Service;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManager;


class BookingManager
{
//    private $session;
//    private $em;
//    
//    public function __construct(EntityManager $em, SessionInterface $session) {
//        $this->em = $em;
//        $this->session = $session;
//    }
    public function initBooking(Sale $sale) {
        $session = $this->session;
        $session->set('sale', $sale);
        $session->set('name', $sale->getName());
        $session->set('surname', $sale->getSurname());
        $session->set('typeticket', $sale->getTypeTicket());
        $session->set('email', $sale->getEmail());
        $session->set('quantity', $sale->getQuantity());
    }
}