<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Routing\RouterInterface;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class mail
{
    private $email;
    private $name;
    private $surname;
    private $ticket;
    
    public function __construct(EntityManager $em, $email, $name, $surname, $ticket) {
        $this->em = $em;
   
    }
}
/*
 * 
 * @Route("/confirmation", name="order_confirmation")
 * 
 */
class SwiftMailer
{
    public function emailAction($email, \Swift_Mailer $mailer)
    {
        
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('melealison@gmail.com')
            ->setTo('$email')
            ->setBody(
                $this->renderView(
                   'AppBundle:order:checkout.html.twig',
                    array('email' => $email)
            ),
            'text/html'
        );

         $mailer->send($message);
    }
}