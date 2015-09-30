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

use UthandoContact\Options\GoogleMapOptions;

class GoogleMapOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GoogleMapOptions
     */
    protected $model;

    public function setUp()
    {
        $this->model = new GoogleMapOptions();
    }

    public function testSetGetLatitude()
    {
        $this->model->setLatitude('51.947637');
        $this->assertSame('51.947637', $this->model->getLatitude());
    }

    public function testSetGetLongitude()
    {
        $this->model->setLongitude('-0.278249');
        $this->assertSame('-0.278249', $this->model->getLongitude());
    }

    public function testSetGetZoom()
    {
        $this->model->setZoom(18);
        $this->assertSame(18, $this->model->getZoom());
    }

    public function testGetSetColor()
    {
        $this->model->setColor('greyscale');
        $this->assertSame('greyscale', $this->model->getColor());
    }
}
