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

use UthandoContact\Options\DetailsOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DetailsOptionsFactory
 *
 * @package UthandoContact\ServiceManager
 */
class DetailsOptionsFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return DetailsOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config         = $serviceLocator->get('config');
        $detailsOptions = (isset($config['uthando_contact']['details'])) ? $config['uthando_contact']['details'] : [];
        $options        = new DetailsOptions($detailsOptions);

        return $options;
    }
}
