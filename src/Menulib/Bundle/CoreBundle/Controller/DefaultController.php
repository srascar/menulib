<?php

namespace Menulib\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MenulibCoreBundle:Default:index.html.twig');
    }
}
