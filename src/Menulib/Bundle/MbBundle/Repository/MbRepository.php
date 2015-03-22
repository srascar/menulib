<?php


namespace Menulib\Bundle\MbBundle\Repository;


use Menulib\Component\Api\Repository\ApiRepository;
use Symfony\Component\Form\FormInterface;

/**
 * Class MbRepository
 * @package Menulib\Bundle\MbBundle\Repository
 */
class MbRepository extends ApiRepository
{
    /**
     * @param FormInterface $form
     *
     * @return string
     */
    public function executeQuery(FormInterface $form)
    {
        $response = $this->httpClient->post($this->getHost(), [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'body' => [$form->getData()->__toArray()]
        ]);

        return $response;
    }
}
