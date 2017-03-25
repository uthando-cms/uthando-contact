<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @author      Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link        https://github.com/uthando-cms for the canonical source repository
 * @copyright   Copyright (c) 2017 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license     see LICENSE
 */

namespace UthandoContact\InputFilter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ContactInputFilterFactory
 *
 * @package UthandoContact\ServiceManager
 */
class ContactInputFilterFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return ContactInputFilter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config         = $serviceLocator->getServiceLocator()->get('config');
        /* @var $request \Zend\Http\PhpEnvironment\Request */
        $request        = $serviceLocator->getServiceLocator()->get('Request');
        $akismetOptions = $config['uthando_common']['akismet'] ?? [];
        $options        = $config['uthando_contact']['form'] ?? [];
        $inputFilter    = new ContactInputFilter();

        $inputFilter->setAkismetEnabled($options['enable_akismet'] ?? false);
        $inputFilter->setAkismetOptions([
            'api_key'       => $akismetOptions['api_key'] ?? null,
            'blog'          => $akismetOptions['blog'] ?? null,
            'user_agent'    => $request->getServer('HTTP_USER_AGENT'),
            'user_ip'       => $request->getServer('REMOTE_ADDR'),
        ]);

        return $inputFilter;
    }
}