<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\Mvc\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\Mvc\Controller;

use UthandoContact\Form\ContactForm;
use UthandoContactTest\Framework\ApplicationTestCase;
use Zend\Http\Header\Referer;

class ContactControllerTest extends ApplicationTestCase
{
    protected $postData = [
        'name' => 'Joe Blogs',
        'email' => 'joe@blogs.com',
        'subject' => 'test',
        'body' => 'test message',
    ];

    public function testIndexAction()
    {
        $this->dispatch('/contact');

        $this->assertResponseStatusCode(200);
        $this->assertModuleName('UthandoContact');
        $this->assertControllerName('UthandoContact\Controller\Contact');
        $this->assertControllerClass('ContactController');
        $this->assertMatchedRouteName('contact');
    }

    public function testValidProcessAction()
    {
        $contactServiceMock = $this->getMockBuilder('UthandoContact\ServiceManager\ContactService')
            ->disableOriginalConstructor()
            ->getMock();

        $formMock = $this->getMockBuilder('UthandoContact\Form\ContactForm')
            ->disableOriginalConstructor()
            ->getMock();

        $formMock->expects($this->once())
            ->method('isValid')
            ->willReturn(true);

        $contactServiceMock->expects($this->once())
            ->method('getContactForm')
            ->will($this->returnValue($formMock));

        $serviceManager = $this->getApplicationServiceLocator();

        $formElementManager = $serviceManager->get('FormElementManager');
        $formElementManager->setAllowOverride(true);
        $formElementManager->setService('UthandoContact', $formMock);

        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('UthandoContact\Service\Contact', $contactServiceMock);



        $this->dispatch('/contact/process', 'POST', $this->postData);

        $this->assertResponseStatusCode(302);
        $this->assertRedirectTo('/contact/thank-you');
    }

    public function testInvalidProcessAction()
    {
        $this->dispatch('/contact/process', 'POST', $this->postData);

        $this->assertResponseStatusCode(200);
        $this->assertModuleName('UthandoContact');
        $this->assertControllerName('UthandoContact\Controller\Contact');
        $this->assertControllerClass('ContactController');
        $this->assertMatchedRouteName('contact/process');
    }

    public function testProcessActionRedirectsWithNoPost()
    {
        $this->dispatch('/contact/process');
        $this->assertRedirectTo('/contact');
    }

    public function testThankYouActionRedirectsIfRefererNotSet()
    {
        $this->dispatch('/contact/thank-you');
        $this->assertRedirectTo('/contact');
    }

    public function testThankYouAction()
    {
        /* @var \Zend\Http\Headers $headers */
        $headers = $this->getRequest()->getHeaders();
        $headers->addHeaderLine('referer', '/contact/process');
        $this->getRequest()->setHeaders($headers);

        $this->dispatch('/contact/thank-you');
        $this->assertResponseStatusCode(200);
    }
}
