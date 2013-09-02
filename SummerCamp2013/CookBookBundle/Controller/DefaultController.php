<?php

namespace CjwNetwork\SummerCamp2013\CookBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CjwCookBookBundle:Default:index.html.twig', array('name' => $name));
    }
}
