<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\View\Helper
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\View\Helper;

use UthandoContact\View\Helper\Contact;
use UthandoContactTest\Framework\ApplicationTestCase;
use UthandoMail\Form\Element\MailTransportList;
use Zend\Form\Element\Select;

class ContactHelperTest extends ApplicationTestCase
{
    /**
     * @var Contact
     */
    protected $contactViewHelper;

    /**
     * @return Contact
     */
    public function getContactViewHelper()
    {
        if (!$this->contactViewHelper instanceof Contact) {
            $this->contactViewHelper = $this->getApplicationServiceLocator()
                ->get('ViewHelperManager')
                ->get('contact');
        }
        return $this->contactViewHelper;
    }

    public function testInvoke()
    {
        $contactHelper = $this->getContactViewHelper();
        $key = $contactHelper('form.name');
        $this->assertSame('ContactForm', $key);
    }

    public function testGet()
    {
        $contactHelper = $this->getContactViewHelper();

        $key = $contactHelper()->get('form.name');
        $this->assertSame('ContactForm', $key);
    }

    public function testGetLibPhoneNumberHelper()
    {
        $contactHelper = $this->getContactViewHelper();
        $libPhoneNumberHelper = $contactHelper()->getLibPhoneNumberHelper();
        $this->assertInstanceOf('UthandoCommon\I18n\View\Helper\LibPhoneNumber', $libPhoneNumberHelper);
    }

    public function testFormatPhoneNumber()
    {
        $contactHelper = $this->getContactViewHelper();
        $localised = $contactHelper()->formatPhoneNumber('phone', true);
        $this->assertSame('01234 123456', $localised->__toString());

        $national = $contactHelper()->formatPhoneNumber('phone');
        $this->assertSame('+441234123456', $national->__toString());
    }

    public function testGetTransportSelect()
    {
        $mockFormElementManager = $this->getMockBuilder('Zend\Form\FormElementManager')
            ->disableOriginalConstructor()
            ->getMock();

        $mockFormElementManager->expects($this->once())
            ->method('get')
            ->with(MailTransportList::class)
            ->willReturn(new Select());
        $this->getApplicationServiceLocator()->setAllowOverride(true);
        $this->getApplicationServiceLocator()->setService('FormElementManager', $mockFormElementManager);

        $contactHelper = $this->getContactViewHelper();
        $selectElement = $contactHelper()->getTransportSelect();

        $this->assertInstanceOf('Zend\Form\Element\Select', $selectElement);
    }

    public function testBusinessHours()
    {
        $contactHelper = $this->getContactViewHelper();
        $string = $contactHelper()->businessHours();

        $this->assertStringStartsWith('<span class="block"><strong>', $string);
    }

    public function testFormatAddress()
    {
        $stringWithCommas = 'Fake Street, Bogus Town, Somewhereshire, SG11 1AA, UK';
        $stringWithNewLines = 'Fake Street<br> Bogus Town<br> Somewhereshire<br> SG11 1AA<br> UK';
        $contactHelper = $this->getContactViewHelper();

        $string = $contactHelper()->formatAddress('details.address');
        $this->assertSame($stringWithCommas, $string);

        $string = $contactHelper()->formatAddress('details.address', true);
        $this->assertSame($stringWithNewLines, $string);
    }
}
