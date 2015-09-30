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

use UthandoContact\Model\AbstractLine;
use UthandoContact\Model\BusinessHoursCollection;

class BusinessHoursCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $testArray = [
            0 => [
                'label' => 'Monday',
                'text'  => '10ap - 5pm',
            ],
        ];

        $collection = new BusinessHoursCollection($testArray);

        $this->assertSame($testArray[0], $collection->offsetGet(0)->getArrayCopy());
    }

    public function testAddBusinessHourLineWithObject()
    {
        $model = new AbstractLine();

        $collection = new BusinessHoursCollection();
        $collection->addBusinessHourLine($model);

        $this->assertSame($model, $collection->offsetGet(0));
    }
}
