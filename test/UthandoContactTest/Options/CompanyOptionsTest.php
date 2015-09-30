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

use UthandoContact\Options\CompanyOptions;

class CompanyOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CompanyOptions
     */
    protected $model;

    public function setUp()
    {
        $this->model = new CompanyOptions();
    }

    public function testSetGetName()
    {
        $this->model->setName('Axiom Corp');
        $this->assertSame('Axiom Corp', $this->model->getName());
    }

    public function testSetGetNumber()
    {
        $this->model->setNumber('1234567890');
        $this->assertSame('1234567890', $this->model->getNumber());
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
}
