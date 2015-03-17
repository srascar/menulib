<?php


namespace Menulib\Bundle\MbBundle\Repository;


use Menulib\Bundle\MbBundle\Entity\MbQuery;
use Menulib\Bundle\MbBundle\Form\MbQueryType;
use Menulib\Component\Api\Repository\ApiRepository;

/**
 * Class MbRepository
 * @package Menulib\Bundle\MbBundle\Repository
 */
class MbRepository extends ApiRepository
{
    /**
     * @param MbQuery $mbQuery
     *
     * @return string
     */
    public function executeQuery(MbQuery $mbQuery)
    {
        $form = $this->formFactory->create(new MbQueryType(), $mbQuery);

        $response = $this->httpClient->post($this->getHost(), [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => $form->getData()
        ]);

        return $response;
    }
}
