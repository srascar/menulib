<?php


namespace Menulib\Bundle\MbBundle\Repository;


use GuzzleHttp\Message\ResponseInterface;
use Menulib\Component\Api\Repository\ApiRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use JMS\Serializer\SerializerInterface;

/**
 * Class MbRepository
 *
 * @package Menulib\Bundle\MbBundle\Repository
 */
class MbRepository extends ApiRepository
{

    /**
     * @var NormalizerInterface
     */
    protected $normalizer;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param FormFactoryInterface $formFactory
     * @param string               $host
     * @param string               $className
     * @param NormalizerInterface  $normalizer
     * @param SerializerInterface  $serializer
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        $host,
        $className,
        NormalizerInterface $normalizer,
        SerializerInterface $serializer
    ) {
        parent::__construct($formFactory, $host, $className);
        $this->normalizer = $normalizer;
        $this->serializer = $serializer;

    }

    /**
     * @param FormInterface $form
     *
     * @return ResponseInterface
     */
    public function executeQuery(FormInterface $form)
    {
        $response = $this->httpClient->post(
            $this->getHost(),
            [
                'headers' => [
                    'Content-Type' => 'multipart/form-data',
                ],
                'body'    => [$this->normalizer->normalize($form->getData())]
            ]
        );

        if (!$response->getStatusCode() == 200) {
            throw new BadRequestHttpException(
                sprintf(
                    'Api query to host %s returned unexpected code %s',
                    $this->getHost(),
                    $response->getStatusCode()
                )
            );
        }

        $menus = $this->serializer->deserialize($response->getBody(), $this->className, 'json');

        return $menus;
    }
}
