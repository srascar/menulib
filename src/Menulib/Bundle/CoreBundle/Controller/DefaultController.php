<?php

namespace Menulib\Bundle\CoreBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Menulib\Bundle\MbBundle\Entity\MbParam;
use Menulib\Bundle\MbBundle\Entity\MbQuery;
use Menulib\Bundle\MbBundle\Form\MbQueryType;
use Menulib\Component\Api\Repository\ApiRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {

        $mbQuery = new MbQuery();

        $form = $this->createForm(new MbQueryType(), $mbQuery);

        if ($request->getMethod() === 'POST') {
            $form->handleRequest($request);
            /** @var ApiRepositoryInterface $mbRepository */
            $mbRepository = $this->get('menulib_mb.repository.mb_repository');
            $response = $mbRepository->executeQuery($form);

            return $this->render(
                'MenulibCoreBundle:Default:index.html.twig',
                array(
                    'form'   => $form->createView(),
                    'response' => $response->getBody(),
                )
            );
        }

        return $this->render(
            'MenulibCoreBundle:Default:index.html.twig',
            array(
                'form'   => $form->createView(),
            )
        );
    }
}
