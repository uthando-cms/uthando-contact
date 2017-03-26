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
use UthandoContact\Options\CompanyOptions;
use UthandoContactTest\Framework\TestCase;

class CompanyFieldSetTest extends TestCase
{
    public function testConstructor()
    {
        $fieldSet = new CompanyFieldSet([
            'name' => 'company-fieldset',
        ]);

        $this->assertInstanceOf('Zend\Hydrator\ClassMethods', $fieldSet->getHydrator());
        $this->assertInstanceOf(CompanyOptions::class, $fieldSet->getObject());
        $this->assertSame('company-fieldset', $fieldSet->getName());
    }

    public function testInit()
    {
        $sl = $this->serviceManager->get('FormElementManager');
        $fieldSet = $sl->get(CompanyFieldSet::class);
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
