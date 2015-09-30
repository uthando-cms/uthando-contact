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


use UthandoContact\Options\DetailsOptions;

class DetailsOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DetailsOptions
     */
    protected $model;

    public function setUp()
    {
        $this->model = new DetailsOptions();
    }

    public function testSetGetName()
    {
        $this->model->setName('Axiom Corp');
        $this->assertSame('Axiom Corp', $this->model->getName());
    }

    public function testSetGetAddress()
    {
        $data = [
            [
                'label' => 'Line1',
                'text'  => 'Address Line 1',
            ],
        ];

        $this->model->setAddress($data);
        $this->assertInstanceOf('UthandoContact\Model\AddressLinesCollection', $this->model->getAddress());

        $this->setExpectedException('Zend\Stdlib\Exception\InvalidArgumentException');

        $this->model->setAddress('invalid data');
        $this->fail('Expected exception "Zend\Stdlib\Exception\InvalidArgumentException" not thrown');
    }

    public function testSetGetPhone()
    {
        $this->model->setPhone('01234 123456');
        $this->assertSame('01234 123456', $this->model->getPhone());
    }

    public function testSetGetFax()
    {
        $this->model->setFax('01234 123456');
        $this->assertSame('01234 123456', $this->model->getFax());
    }

    public function testSetGetMobile()
    {
        $this->model->setMobile('01234 123456');
        $this->assertSame('01234 123456', $this->model->getMobile());
    }

    public function testSetGetEmail()
    {
        $this->model->setEmail('joe@blogs.com');
        $this->assertSame('joe@blogs.com', $this->model->getEmail());
    }

    public function testSetGetBusinessHours()
    {
        $data = [
            [
                'label' => 'Monday',
                'text'  => '10ap - 5pm',
            ],
        ];

        $this->model->setBusinessHours($data);
        $this->assertInstanceOf('UthandoContact\Model\BusinessHoursCollection', $this->model->getBusinessHours());

        $this->setExpectedException('Zend\Stdlib\Exception\InvalidArgumentException');

        $this->model->setBusinessHours('invalid data');
        $this->fail('Expected exception "Zend\Stdlib\Exception\InvalidArgumentException" not thrown');
    }

    public function testSetGetText()
    {
        $this->model->setText('This is a short text about the company');
        $this->assertSame('This is a short text about the company', $this->model->getText());
    }
}
