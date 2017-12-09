<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\ServiceManager
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContact\Options\Service;

use UthandoContact\Options\FormOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class FormOptionsFactory
 * @package UthandoContact\Options\Service
 */
class FormOptionsFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator): FormOptions
    {
        $config         = $serviceLocator->get('config');
        $options        = $config['uthando_contact']['form'] ?? [];
        $options        = new FormOptions($options);

        return $options;
    }
}
