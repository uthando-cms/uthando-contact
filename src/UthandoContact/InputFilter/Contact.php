<?php
namespace UthandoContact\InputFilter;

use Zend\InputFilter\InputFilter;
use Zend\Validator\Hostname as HostnameValidator;

class Contact extends InputFilter
{
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
