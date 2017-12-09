<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @author      Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link        https://github.com/uthando-cms for the canonical source repository
 * @copyright   Copyright (c) 08/12/17 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license     see LICENSE
 */

namespace UthandoContact\Options\Service;

use UthandoContact\Options\GoogleMapOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GoogleMapOptionsFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator): GoogleMapOptions
    {
        $config         = $serviceLocator->get('config');
        $formOptions    = $config['uthando_contact']['google_map'] ?? [];
        $options        = new GoogleMapOptions($formOptions);

        return $options;
    }
}
