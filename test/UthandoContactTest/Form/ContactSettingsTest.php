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

class ContactSettingsTest extends TestCase
{
    public function testInit()
    {
        $sl = $this->serviceManager->get('FormElementManager');
        $fieldSet = $sl->get('UthandoContactSettings');
        $fieldSet->init();

        $this->assertTrue($fieldSet->has('form'));
        $this->assertTrue($fieldSet->has('details'));
        $this->assertTrue($fieldSet->has('company'));
        $this->assertTrue($fieldSet->has('google_map'));
        $this->assertTrue($fieldSet->has('button-submit'));
    }
}
