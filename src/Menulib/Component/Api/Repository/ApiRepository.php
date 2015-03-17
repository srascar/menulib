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


class ApiRepository
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
     * @param FormFactoryInterface $formFactory
     * @param string               $host
     */
    public function __construct(FormFactoryInterface $formFactory, $host)
    {
        $this->formFactory = $formFactory;
        $this->host = $host;
        $this->httpClient = new Client();
    }

    /**
     * @return mixed
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
}
