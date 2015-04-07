<?php
/*
 * This file is part of the Menulib package.
 *
 * (c) Sylvain Rascar <sylvain.rascar@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Menulib\Bundle\MbBundle\Serializer;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\Context;
use Menulib\Bundle\MbBundle\Entity\MbQuery;
use Menulib\Bundle\MbBundle\Exception\MbResponseException;


class MbResponseHandler implements SubscribingHandlerInterface
{

    public static function getSubscribingMethods()
    {
        return array(
            array(
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'Json',
                'type' => 'MbResponse',
                'method' => 'deserializeMbResponseFromJson',
            ),
        );
    }

    /**
     * @param JsonDeserializationVisitor $visitor
     * @param string                     $data
     * @param array                      $type
     * @param Context                    $context
     *
     * @throws MbResponseException
     * @return mixed
     *
     * @todo get query from context
     */
    public function deserializeMbResponseFromJson(JsonDeserializationVisitor $visitor, $data, array $type, Context $context)
    {
        if (!isset($data['#data']) || !isset($data['#error'])) {
            throw new MbResponseException('Invalid response format: missing key "#data" or "#error"');
        }
        if ($data['#error'] !== false) {
            throw new MbResponseException(sprintf('Invalid response with error: %s', $data['#error']));
        }

        $set = $data['#data'][0]['set'];

//        $root = $set[$query->getTargetId()];
        $root = $set['root.current_week'];

        $days = $root[MbQuery::DAYS_LIST_KEY];

        $shoppingList = $root[MbQuery::SHOPPING_LIST_KEY];


        var_dump($days);die;



        return ;
    }

} 