<?php
/*
 * This file is part of the Menulib package.
 *
 * (c) Sylvain Rascar <sylvain.rascar@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Menulib\Bundle\MbBundle\Normalizer;


use Menulib\Bundle\MbBundle\Entity\MbQuery;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class MbQueryNormalizer implements NormalizerInterface
{
    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param object $object  object to normalize
     * @param string $format  format the normalization result will be encoded as
     * @param array  $context Context options for the normalizer
     *
     * @return array|string|bool|int|float|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        if (!$object instanceof MbQuery) {
            return;
        }

        return [
            'method' => $object->getMethod(),
            'target_id' => $object->getTargetId(),
            'action' => $object->getAction(),
            'params' => array($object->getParams()),
        ];
    }


    /**
     * Checks whether the given class is supported for normalization by this normalizer.
     *
     * @param mixed  $data   Data to normalize.
     * @param string $format The format being (de-)serialized from or into.
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof MbQuery;
    }
}