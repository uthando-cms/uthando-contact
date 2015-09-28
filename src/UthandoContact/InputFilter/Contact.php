<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\InputFilter
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContact\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\Validator\Hostname as HostnameValidator;

/**
 * Class Contact
 *
 * @package UthandoContact\InputFilter
 */
class Contact extends InputFilter
{
    /**
     * Set up elements
     */
    public function __construct()
    {
        $this->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => 'StripTags']
            ],
        ]);
        
        $this->add([
            'name' => 'email',
            'required' => true,
            'validators' => [
                ['name' => 'EmailAddress', 'options' => [
                    'allow' => HostnameValidator::ALLOW_DNS,
                    'domain' => true
                ]],
            ],
        ]);
    
        $this->add([
            'name'       => 'subject',
            'required'   => true,
            'filters'    => [
                ['name'    => 'StripTags'],
            ],
            'validators' => [
                ['name'    => 'StringLength', 'options' => [
                    'encoding' => 'UTF-8',
                    'min'      => 2,
                    'max'      => 140,
                ]],
            ],
        ]);
        
        $this->add([
            'name' => 'body',
            'required' => true
        ]);
    }
}
