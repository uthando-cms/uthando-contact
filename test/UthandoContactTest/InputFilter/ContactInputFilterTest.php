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

use UthandoCommon\Validator\Akismet;
use UthandoContact\InputFilter\ContactInputFilter;
use UthandoContactTest\Framework\TestCase;

class ContactInputFilterTest extends TestCase
{
    protected $akismetOptions = [
        'api_key'       => '1234567890',
        'blog'          => 'http://example.com',
        'user_agent'    => '',
        'user_ip'       => '127.0.0.1',
    ];

    public function testGetSetAkismetEnabled()
    {
        $inputFilter = new ContactInputFilter();
        $inputFilter->setAkismetEnabled(true);

        $this->assertTrue($inputFilter->isAkismetEnabled());
    }

    public function testGetSetAkismetOptions()
    {
        $inputFilter = new ContactInputFilter();
        $inputFilter->setAkismetOptions($this->akismetOptions);

        $this->assertSame($this->akismetOptions, $inputFilter->getAkismetOptions());
    }

    public function testInit()
    {
        $inputFilter = new ContactInputFilter();
        $inputFilter->init();

        $this->assertTrue($inputFilter->has('name'));
        $this->assertTrue($inputFilter->has('email'));
        $this->assertTrue($inputFilter->has('subject'));
        $this->assertTrue($inputFilter->has('body'));
    }

    public function testAkismetFilterSet()
    {
        $sl = $this->serviceManager->get('InputFilterManager');
        $inputFilter = $sl->get(ContactInputFilter::class);
        $inputFilter->setAkismetEnabled(true);
        $inputFilter->setAkismetOptions($this->akismetOptions);
        $inputFilter->init();

        $validators = $inputFilter->get('body')
            ->getValidatorChain()
            ->getValidators();

        $akismetValidatorSet = false;

        foreach ($validators as $key => $value) {
            if ($value['instance'] instanceof Akismet) {
                $akismetValidatorSet = true;
            }
        };

        $this->assertTrue($akismetValidatorSet);
    }
}
