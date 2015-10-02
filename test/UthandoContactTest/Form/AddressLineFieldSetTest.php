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

use UthandoContact\Form\AddressLineFieldSet;

class AddressLineFieldSetTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $fieldSet = new AddressLineFieldSet();

        $this->assertInstanceOf('Zend\Hydrator\ClassMethods', $fieldSet->getHydrator());
        $this->assertInstanceOf('UthandoContact\Model\AbstractLine', $fieldSet->getObject());
    }

    public function testInit()
    {
        $fieldSet = new AddressLineFieldSet();
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('label'));
        $this->assertTrue($fieldSet->has('text'));
    }

    public function testGetInputFilterSpecification()
    {
        $fieldset = new AddressLineFieldSet();
        $spec = $fieldset->getInputFilterSpecification();

        $this->assertArrayHasKey('label', $spec);
        $this->assertArrayHasKey('text', $spec);
    }
}
