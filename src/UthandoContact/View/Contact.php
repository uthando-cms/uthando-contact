<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\View;

use UthandoCommon\View\AbstractViewHelper;
use Zend\Config\Config;

/**
 * Class Contact
 *
 * @package UthandoContact\View
 */
class Contact extends AbstractViewHelper
{
    /**
     * @var Config
     */
    protected $contactConfig;

    /**
     * @param null $key
     * @return $this|Config|string
     */
    public function __invoke($key=null)
    {
        if (!$this->contactConfig instanceof Config) {
            $config = $this->getConfig('contact');

            if (!$config instanceof Config) {
                $config = new Config($config);
            }

            $this->contactConfig = $config;
        }

        if (is_string($key)) {
            return $this->get($key);
        }

        return $this;
    }

    /**
     * @param $key
     * @return Config|string|null
     */
    public function get($key)
    {
        $keys = explode('.', $key);
        $returnValue = null;
        $config = $this->contactConfig;

        foreach ($keys as $key) {

            $returnValue = $config->get($key);

            if ($returnValue instanceof Config) {
                $config = $returnValue;
            }
        }

        return $returnValue;
    }
}
