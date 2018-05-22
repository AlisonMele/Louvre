<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$datetime1 = new \DateTime(); // date actuelle
$brith = new \DateTime('1993-09-28');
$age = $datetime1->diff($birth, true)->y; // le y = nombre d'années ex : 22
if(y > 18){
 $price = 15;
}
if(y < 2){
    $price = 0;
}