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


use UthandoContact\Form\CompanyOptionsFieldSet;
use UthandoContactTest\Framework\TestCase;

class CompanyOptionsFieldSetTest extends TestCase
{
    public function testConstructor()
    {
        $fieldSet = new CompanyOptionsFieldSet();

        $this->assertInstanceOf('Zend\Hydrator\ClassMethods', $fieldSet->getHydrator());
        $this->assertInstanceOf('UthandoContact\Options\CompanyOptions', $fieldSet->getObject());
    }

    public function testInit()
    {
        $sl = $this->serviceManager->get('FormElementManager');
        $fieldSet = $sl->get('UthandoContactCompanyOptionsFieldSet');
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('name'));
        $this->assertTrue($fieldSet->has('number'));
        $this->assertInstanceOf('Zend\Form\Element\Collection', $fieldSet->get('address'));
    }

    public function testGetInputFilterConfig()
    {
        $fieldSet = new CompanyOptionsFieldSet();
        $spec = $fieldSet->getInputFilterSpecification();

        $this->assertArrayHasKey('name', $spec);
        $this->assertArrayHasKey('number', $spec);
    }
}
