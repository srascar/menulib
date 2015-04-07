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
     * @var string
     */
    protected $className;

    /**
     * @param FormFactoryInterface $formFactory
     * @param string               $host
     * @param string               $className
     */
    public function __construct(FormFactoryInterface $formFactory, $host, $className)
    {
        $this->formFactory = $formFactory;
        $this->host = $host;
        $this->className = $className;
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
