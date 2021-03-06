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

use UthandoContact\Form\DetailsFieldSet;
use UthandoContactTest\Framework\TestCase;

class DetailsFieldSetTest extends TestCase
{
    public function testConstructor()
    {
        $fieldSet = new DetailsFieldSet([
            'name' => 'details-fieldset',
        ]);

        $this->assertInstanceOf('Zend\Hydrator\ClassMethods', $fieldSet->getHydrator());
        $this->assertInstanceOf('UthandoContact\Options\DetailsOptions', $fieldSet->getObject());
        $this->assertSame('details-fieldset', $fieldSet->getName());
    }

    public function testInit()
    {
        $sl = $this->serviceManager->get('FormElementManager');
        $fieldSet = $sl->get(DetailsFieldSet::class);
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('name'));
        $this->assertTrue($fieldSet->has('address'));
        $this->assertTrue($fieldSet->has('phone_region'));
        $this->assertTrue($fieldSet->has('phone'));
        $this->assertTrue($fieldSet->has('mobile'));
        $this->assertTrue($fieldSet->has('fax'));
        $this->assertTrue($fieldSet->has('email'));
        $this->assertTrue($fieldSet->has('business_hours'));
        $this->assertTrue($fieldSet->has('about_us_text'));
    }

    public function testGetInputFilterConfig()
    {
        $sl = $this->serviceManager->get('FormElementManager');
        $fieldSet = $sl->get(DetailsFieldSet::class);
        $fieldSet->init();
        $spec = $fieldSet->getInputFilterSpecification();

        $this->assertArrayHasKey('name', $spec);
        $this->assertArrayHasKey('phone', $spec);
        $this->assertArrayHasKey('mobile', $spec);
        $this->assertArrayHasKey('fax', $spec);
        $this->assertArrayHasKey('email', $spec);
        $this->assertArrayHasKey('about_us_text', $spec);
    }
}
