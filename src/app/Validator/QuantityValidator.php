<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class QuantityValidator extends ConstraintValidator 
{
    private $em;
  
    public function __construct(EntityManager $em)
    {
  	$this->em = $em;
    }
    public function validate($value, Constraint $constraint)
    {
        if (($visit) < 1 OR ($visit) > 8) {
            $this->context->buildsViolation($constraint->message)
                              ->setParameter('%string%', $value)
                              ->addViolation();
        }
    }
}