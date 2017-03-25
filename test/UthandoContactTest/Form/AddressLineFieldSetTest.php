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

use UthandoContact\Form\AbstractLineFieldSet;

class AddressLineFieldSetTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $fieldSet = new AbstractLineFieldSet([
            'name' => 'abstract-line',
        ]);

        $this->assertInstanceOf('Zend\Hydrator\ClassMethods', $fieldSet->getHydrator());
        $this->assertInstanceOf('UthandoContact\Model\AbstractLine', $fieldSet->getObject());
        $this->assertSame('abstract-line', $fieldSet->getName());
    }

    public function testInit()
    {
        $fieldSet = new AbstractLineFieldSet();
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('label'));
        $this->assertTrue($fieldSet->has('text'));
    }

    public function testGetInputFilterSpecification()
    {
        $fieldset = new AbstractLineFieldSet();
        $spec = $fieldset->getInputFilterSpecification();

        $this->assertArrayHasKey('label', $spec);
        $this->assertArrayHasKey('text', $spec);
    }
}
