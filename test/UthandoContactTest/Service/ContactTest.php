<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\Service;

use UthandoContactTest\Framework\TestCase;

class ContactTest extends TestCase
{
    protected $postData = [
        'name' => 'Joe Blogs',
        'email' => 'joe@blogs.com',
        'subject' => 'test',
        'body' => 'test message',
    ];

    public function testSendMail()
    {
        $formMock = $this->getMockBuilder('UthandoContact\Form\ContactForm')
            ->disableOriginalConstructor()
            ->getMock();

        $formMock->expects($this->once())
            ->method('getData')
            ->willReturn($this->postData);

        $service = $this->serviceManager->get('UthandoContact\Service\Contact');

        $response = $service->sendEmail($formMock);
        $this->assertTrue($response);
    }
}
