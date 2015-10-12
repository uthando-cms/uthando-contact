<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\ServiceManager
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContact\ServiceManager;

use UthandoContact\Options\FormOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class FormOptionsFactory
 *
 * @package UthandoContact\ServiceManager
 */
class FormOptionsFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return FormOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config         = $serviceLocator->get('config');
        $formOptions    = (isset($config['uthando_contact']['form'])) ? $config['uthando_contact']['form'] : [];
        $options        = new FormOptions($formOptions);

        return $options;
    }
}
