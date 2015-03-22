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


use Symfony\Component\Form\FormInterface;

Interface ApiRepositoryInterface
{
    /**
     * @return string
     */
    public function getHost();

    /**
     * @param string $host
     */
    public function setHost($host);

    /**
     * @param FormInterface $form
     *
     * @return string
     */
    public function executeQuery(FormInterface $form);
}
