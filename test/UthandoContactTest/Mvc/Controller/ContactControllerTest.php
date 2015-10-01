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

use UthandoContactTest\Framework\ApplicationTestCase;

class ContactControllerTest extends ApplicationTestCase
{
    public function testIndexAction()
    {
        $this->dispatch('/contact');

        $this->assertResponseStatusCode(200);
    }

    public function testProcessAction()
    {

    }

    public function testThankYouAction()
    {

    }
}
