<?php
/*
 * This file is part of the Menulib package.
 *
 * (c) Sylvain Rascar <sylvain.rascar@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Menulib\Component\Api\Repository;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;


abstract class ApiRepository implements ApiRepositoryInterface
{
    /**
     * @var string
     */
    protected $host;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @var NormalizerInterface
     */
    protected $normalizer;

    /**
     * @param FormFactoryInterface $formFactory
     * @param NormalizerInterface  $normalizer
     * @param string               $host
     */
    public function __construct(FormFactoryInterface $formFactory, NormalizerInterface $normalizer, $host)
    {
        $this->formFactory = $formFactory;
        $this->host = $host;
        $this->normalizer = $normalizer;
        $this->httpClient = new Client();
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @param FormInterface $form
     *
     * @return string
     */
    abstract public function executeQuery(FormInterface $form);
}
