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


class ApiRepository
{
    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $entityClass;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @param ClientInterface $httpClient
     */
//    public function __construct(ClientInterface $httpClient)
//    {
//        $this->httpClient = $httpClient;
//    }
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * @return mixed
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }

    /**
     * @param mixed $entityClass
     */
    public function setEntityClass($entityClass)
    {
        $this->entityClass = $entityClass;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }
}
