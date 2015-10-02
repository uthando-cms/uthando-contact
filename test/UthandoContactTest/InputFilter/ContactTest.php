<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\InputFilter
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\InputFilter;


use UthandoContact\InputFilter\Contact;

class ContactTest extends \PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $inputFilter = new Contact();
        $inputFilter->init();

        $this->assertTrue($inputFilter->has('name'));
        $this->assertTrue($inputFilter->has('email'));
        $this->assertTrue($inputFilter->has('subject'));
        $this->assertTrue($inputFilter->has('body'));
    }
}
