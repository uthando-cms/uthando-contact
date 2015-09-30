<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Mvc\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\Mvc\Controller;

use UthandoCommon\Controller\SettingsTrait;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class Settings
 *
 * @package UthandoContact\Mvc\Controller
 */
class Settings extends AbstractActionController
{
    use SettingsTrait;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setFormName('UthandoContactSettings')
            ->setConfigKey('uthando_contact');
    }
}
