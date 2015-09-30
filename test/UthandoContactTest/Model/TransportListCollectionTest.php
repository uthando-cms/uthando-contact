<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoMailTest\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\Model;

use UthandoContact\Model\AbstractLine;
use UthandoContact\Model\TransportListCollection;

class TransportListCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $testArray = [
            0 => [
                'label' => 'Webmaster',
                'text'  => 'webmaster',
            ],
        ];

        $collection = new TransportListCollection($testArray);

        $this->assertSame($testArray[0], $collection->offsetGet(0)->getArrayCopy());
    }

    public function testAddTransportLineWithObject()
    {
        $model = new AbstractLine();

        $collection = new TransportListCollection();
        $collection->addTransportLine($model);

        $this->assertSame($model, $collection->offsetGet(0));
    }
}
