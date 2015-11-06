<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\Form
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\Form;

use UthandoContact\Form\GoogleMapFieldSet;

class GoogleMapFieldSetTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $fieldSet = new GoogleMapFieldSet();

        $this->assertInstanceOf('Zend\Hydrator\ClassMethods', $fieldSet->getHydrator());
        $this->assertInstanceOf('UthandoContact\Options\GoogleMapOptions', $fieldSet->getObject());
    }

    public function testInit()
    {
        $fieldSet = new GoogleMapFieldSet();
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('latitude'));
        $this->assertTrue($fieldSet->has('longitude'));
        $this->assertTrue($fieldSet->has('zoom'));
        $this->assertTrue($fieldSet->has('color'));
        $this->assertTrue($fieldSet->has('show_map'));
    }

    public function testGetInputFilterSpecification()
    {
        $fieldSet = new GoogleMapFieldSet();
        $spec = $fieldSet->getInputFilterSpecification();

        $this->assertArrayHasKey('latitude', $spec);
        $this->assertArrayHasKey('longitude', $spec);
        $this->assertArrayHasKey('zoom', $spec);
        $this->assertArrayHasKey('color', $spec);
        $this->assertArrayHasKey('show_map', $spec);
    }
}
