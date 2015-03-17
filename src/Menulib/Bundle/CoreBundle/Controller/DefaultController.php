<?php

namespace Menulib\Bundle\CoreBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Menulib\Bundle\MbBundle\Entity\Mbparam;
use Menulib\Bundle\MbBundle\Entity\MbQuery;
use Menulib\Bundle\MbBundle\Repository\MbRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $mbParams = new ArrayCollection($this->createMbParams());

        $mbQuery = new MbQuery();
        $mbQuery->setParams($mbParams);

        $mbRepository = $this->get('menulib_mb.repository.mb_repository');

        $mbResponse = $mbRepository->executeQuery($mbQuery);

        return $this->render(
            'MenulibCoreBundle:Default:index.html.twig',
            array(
                'mbQuery'   => $mbQuery,
                'mbResponse' => $mbResponse,
            )
        );
    }

    /**
     * @return array
     */
    protected function createMbParams()
    {
        $now = new \DateTime();
        $mbParam1 = new Mbparam('selected_template_day', 'string', "day/7");
        $mbParam2 = new Mbparam('first_day', 'timestamp', $now->getTimestamp());
        $mbParam3 = new Mbparam('person_count', 'int', 2);
        $mbParam4 = new Mbparam('repas_type_dejeuner', 'string', 'ENTREE_PLAT_DESSERT');
        $mbParam5 = new Mbparam('repas_type_diner', 'string', 'ENTREE_PLAT_DESSERT');
        $mbParam6 = new Mbparam('day_type', 'string', null);
        $mbParam7 = new Mbparam('express', 'bool', false);
        $mbParam8 = new Mbparam('porc', 'bool', false);

        return array(
            $mbParam1,
            $mbParam2,
            $mbParam3,
            $mbParam4,
            $mbParam5,
            $mbParam6,
            $mbParam7,
            $mbParam8,
        );
    }
}
