<?php


namespace Menulib\Bundle\MbBundle\Repository;


use GuzzleHttp\Message\ResponseInterface;
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
     * @return ResponseInterface
     */
    public function executeQuery(FormInterface $form)
    {
        $response = $this->httpClient->post($this->getHost(), [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'body' => [$this->normalizer->normalize($form->getData())]
        ]);

        return $response;
    }
}
