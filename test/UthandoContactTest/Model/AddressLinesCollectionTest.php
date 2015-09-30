<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\Model;

use UthandoContact\Model\AddressLinesCollection;
use UthandoContact\Model\AbstractLine;

class AddressLinesCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $testArray = [
            0 => [
                'label' => 'line1',
                'text'  => 'some street',
            ],
        ];

        $collection = new AddressLinesCollection($testArray);

        $this->assertSame($testArray[0], $collection->offsetGet(0)->getArrayCopy());
    }

    public function testAddAddressLineWithObject()
    {
        $model = new AbstractLine();

        $collection = new AddressLinesCollection();
        $collection->addAddressLine($model);

        $this->assertSame($model, $collection->offsetGet(0));
    }
}
