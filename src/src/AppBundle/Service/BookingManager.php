<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Component\HtppFoundation\Session\SessionInterface;

class BookingManager
{
    private $session;
    
    public function __construct(SessionInterface $session)
    {
        $this->session =$session;
    }
    
    public function initBooking(Sale $sale)
    {
        $session = $this->session;
        $session->set('Sale', $sale);
        $session->set('quantity', $sale->getQuantity());
    }
}

