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

use UthandoContact\Form\ContactForm;
use UthandoContact\Form\ContactSettings;
use UthandoContactTest\Framework\TestCase;

class ContactSettingsTest extends TestCase
{
    public function testInit()
    {
        $sl = $this->serviceManager->get('FormElementManager');
        $fieldSet = $sl->get(ContactSettings::class);
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('form'));
        $this->assertTrue($fieldSet->has('details'));
        $this->assertTrue($fieldSet->has('company'));
        $this->assertTrue($fieldSet->has('google_map'));
    }

    public function testConstructorSetsNameFromOptions()
    {
        $fieldSet = new ContactForm([
            'name' => 'contact-form',
        ]);

        $this->assertSame('contact-form', $fieldSet->getName());
    }
}
