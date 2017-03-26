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

use UthandoContact\Form\ContactForm;
use UthandoContact\ServiceManager\ContactService;
use UthandoContactTest\Framework\TestCase;

class ContactTest extends TestCase
{
    protected $postData = [
        'name' => 'Joe Blogs',
        'email' => 'joe@blogs.com',
        'subject' => 'test',
        'transport' => 'default',
        'body' => 'test message',
    ];

    public function testSendMail()
    {
        $formMock = $this->getMockBuilder(ContactForm::class)
            ->disableOriginalConstructor()
            ->getMock();

        $formMock->expects($this->once())
            ->method('getData')
            ->willReturn($this->postData);

        $service = $this->serviceManager->get(ContactService::class);

        $response = $service->sendEmail($formMock);
        $this->assertTrue($response);
    }
}
