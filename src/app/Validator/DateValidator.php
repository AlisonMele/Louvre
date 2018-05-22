<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of DateValidator
 *
 * @author Alison
 */
class DateValidator extends ConstraintValidator 
{
    private $em;
  
    public function __construct(EntityManager $em)
    {
  	$this->em = $em;
    }
    public function validate($value, Constraint $constraint)
    {
        $quantity = $this->em->getRepository('AppBundle:Sale')->findByDate($quantity);
  
        if ($quantity === 1500)
        {
        	$this->context->buildViolation($constraint->message)
                              ->setParameter('Il n\'y a plys de place disponible', $value)
                              ->addViolation();
        }
    }
}
