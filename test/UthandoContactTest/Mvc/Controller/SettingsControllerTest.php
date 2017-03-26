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

use UthandoContact\Form\ContactSettings;
use UthandoContact\Mvc\Controller\SettingsController;
use UthandoContactTest\Framework\TestCase;

class SettingsControllerTest extends TestCase
{
    public function testCanGetControllerFromServiceManager()
    {
        /* @var $controller \UthandoDomPdf\Mvc\Controller\Settings */
        $controller = $this->serviceManager->get('ControllerManager')
            ->get(SettingsController::class);

        $this->assertInstanceOf('UthandoContact\Mvc\Controller\SettingsController', $controller);
        $this->assertSame(ContactSettings::class, $controller->getFormName());
        $this->assertSame('uthando_contact', $controller->getConfigKey());
    }
}
