<?php

namespace Menulib\Bundle\MbBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MenulibMbBundle:Default:index.html.twig', array('name' => $name));
    }
}
