<?php
/*
 * This file is part of the Menulib package.
 *
 * (c) Sylvain Rascar <sylvain.rascar@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Menulib\Bundle\MbBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class MbQuery
 * @package Menulib\Bundle\MbBundle\Entity
 */
class MbQuery
{
    const DAYS_LIST_KEY = 'days';

    const SHOPPING_LIST_KEY = 'courses';

    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $targetId;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var array
     */
    protected $params;

    /**
     * @param string $method
     * @param string $targetId
     * @param string $action
     */
    function __construct($method = "pg_front.action", $targetId = "root.current_week", $action = "generate")
    {
        $this->method = $method;
        $this->targetId = $targetId;
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getTargetId()
    {
        return $this->targetId;
    }

    /**
     * @param mixed $targetId
     */
    public function setTargetId($targetId)
    {
        $this->targetId = $targetId;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }
}
