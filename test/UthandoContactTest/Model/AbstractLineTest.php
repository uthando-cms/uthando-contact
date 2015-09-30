<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\Model;

use UthandoContact\Model\AbstractLine;

class AbstractLineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractLine
     */
    protected $model;

    public function setUp()
    {
        $this->model = new AbstractLine();
    }

    public function testSetGetLabel()
    {
        $this->model->setLabel('Webmaster');
        $this->assertSame('Webmaster', $this->model->getLabel());
    }

    public function testSetGetText()
    {
        $this->model->setText('webmaster');
        $this->assertSame('webmaster', $this->model->getText());
    }
}
