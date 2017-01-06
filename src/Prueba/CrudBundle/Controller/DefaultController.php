<?php

namespace Prueba\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PruebaCrudBundle:Default:index.html.twig');
    }
}
