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

use UthandoContactTest\Framework\TestCase;
use UthandoContact\Form\FormFieldSet;

class FormFieldSetTest extends TestCase
{
    public function testConstructor()
    {
        $fieldSet = new FormFieldSet([
            'name' => 'form-fieldset',
        ]);

        $this->assertInstanceOf('Zend\Hydrator\ClassMethods', $fieldSet->getHydrator());
        $this->assertInstanceOf('UthandoContact\Options\FormOptions', $fieldSet->getObject());
        $this->assertSame('form-fieldset', $fieldSet->getName());
    }

    public function testInit()
    {
        $sl = $this->serviceManager->get('FormElementManager');
        $fieldSet = $sl->get('UthandoContactFormFieldSet');
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('name'));
        $this->assertTrue($fieldSet->has('transport_list'));
        $this->assertTrue($fieldSet->has('send_copy_to_sender'));
        $this->assertTrue($fieldSet->has('enable_captcha'));
        $this->assertTrue($fieldSet->has('enable_akismet'));
    }

    public function testGetInputFilterSpecification()
    {
        $fieldSet = new FormFieldSet();
        $spec = $fieldSet->getInputFilterSpecification();

        $this->assertArrayHasKey('name', $spec);
        $this->assertArrayHasKey('send_copy_to_sender', $spec);
        $this->assertArrayHasKey('enable_captcha', $spec);
        $this->assertArrayHasKey('enable_akismet', $spec);
    }
}
