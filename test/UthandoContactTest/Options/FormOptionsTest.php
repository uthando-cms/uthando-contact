<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\Options;

use UthandoContact\Options\FormOptions;

class FormOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FormOptions
     */
    protected $model;

    public function setUp()
    {
        $this->model = new FormOptions();
    }

    public function testSetGetName()
    {
        $this->model->setName('ContactService Form');
        $this->assertSame('ContactService Form', $this->model->getName());
    }

    public function testSetGetTransportList()
    {
        $data = [
            [
                'label' => 'webmaster',
                'text'  => 'Webmaster',
            ],
        ];

        $this->model->setTransportList($data);
        $this->assertInstanceOf('UthandoContact\Model\TransportListCollection', $this->model->getTransportList());

        $this->setExpectedException('Zend\Stdlib\Exception\InvalidArgumentException');

        $this->model->setTransportList('invalid data');
        $this->fail('Expected exception "Zend\Stdlib\Exception\InvalidArgumentException" not thrown');
    }

    public function testGetSetSendCopyToSender()
    {
        $this->model->setSendCopyToSender(true);
        $this->assertTrue($this->model->getSendCopyToSender());
    }

    public function testSetGetEnableCaptcha()
    {
        $this->model->setEnableCaptcha(true);
        $this->assertTrue($this->model->getEnableCaptcha());
    }

    public function testSetGetEnableAkismet()
    {
        $this->model->setEnableAkismet(true);
        $this->assertTrue($this->model->getEnableAkismet());
    }
}
