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


use UthandoContact\Form\CompanyFieldSet;
use UthandoContactTest\Framework\TestCase;

class CompanyFieldSetTest extends TestCase
{
    public function testConstructor()
    {
        $fieldSet = new CompanyFieldSet();

        $this->assertInstanceOf('Zend\Hydrator\ClassMethods', $fieldSet->getHydrator());
        $this->assertInstanceOf('UthandoContact\Options\CompanyOptions', $fieldSet->getObject());
    }

    public function testInit()
    {
        $sl = $this->serviceManager->get('FormElementManager');
        $fieldSet = $sl->get('UthandoContactCompanyFieldSet');
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('name'));
        $this->assertTrue($fieldSet->has('number'));
        $this->assertInstanceOf('Zend\Form\Element\Collection', $fieldSet->get('address'));
    }

    public function testGetInputFilterConfig()
    {
        $fieldSet = new CompanyFieldSet();
        $spec = $fieldSet->getInputFilterSpecification();

        $this->assertArrayHasKey('name', $spec);
        $this->assertArrayHasKey('number', $spec);
    }
}
