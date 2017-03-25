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

use UthandoCommon\Validator\Akismet;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Hostname as HostnameValidator;

/**
 * Class ContactInputFilter
 *
 * @package UthandoContact\InputFilter
 */
class ContactInputFilter extends InputFilter
{
    /**
     * @var bool
     */
    protected $akismetEnabled = false;

    /**
     * @var array
     */
    protected $akismetOptions = [];

    /**
     * Set up elements
     */
    public function init()
    {
        $this->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ],
        ]);

        $this->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                ['name' => 'EmailAddress', 'options' => [
                    'allow' => HostnameValidator::ALLOW_DNS,
                    'domain' => true
                ]],
            ],
        ]);

        $this->add([
            'name' => 'subject',
            'required' => true,
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                ['name' => 'StringLength', 'options' => [
                    'encoding' => 'UTF-8',
                    'min' => 2,
                    'max' => 140,
                ]],
            ],
        ]);

        $this->add([
            'name' => 'body',
            'required' => true,
            'filters' => [
                ['name' => 'StripTags'],
            ],
        ]);

        if ($this->isAkismetEnabled()) {
            $options = $this->getAkismetOptions();

            $this->get('body')
                ->getValidatorChain()
                ->attachByName('UthandoCommonAkismet', [
                    'api_key'               => $options['api_key'] ?? null,
                    'blog'                  => $options['blog'] ?? null,
                    'comment_type'          => Akismet::COMMENT_TYPE_CONTACT_FORM,
                    'comment_author'        => 'name',
                    'comment_author_email'  => 'email',
                    'user_agent'            => $options['user_agent'] ?? null,
                    'user_ip'               => $options['user_ip'] ?? null,
            ]);
        }
    }

    /**
     * @return bool
     */
    public function isAkismetEnabled(): bool
    {
        return $this->akismetEnabled;
    }

    /**
     * @param bool $akismetEnabled
     * @return ContactInputFilter
     */
    public function setAkismetEnabled(bool $akismetEnabled): ContactInputFilter
    {
        $this->akismetEnabled = $akismetEnabled;
        return $this;
    }

    /**
     * @return array
     */
    public function getAkismetOptions(): array
    {
        return $this->akismetOptions;
    }

    /**
     * @param array $akismetOptions
     * @return ContactInputFilter
     */
    public function setAkismetOptions(array $akismetOptions): ContactInputFilter
    {
        $this->akismetOptions = $akismetOptions;
        return $this;
    }
}
