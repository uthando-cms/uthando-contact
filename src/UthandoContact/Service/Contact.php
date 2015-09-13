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

namespace UthandoContact\Service;

use UthandoCommon\Service\AbstractService;
use Zend\Form\Form;

/**
 * Class Contact
 *
 * @package UthandoContact\Service
 */
class Contact extends AbstractService
{
    /**
     * @param $data
     */
    public function sendEmail($data)
    {
        if ($data instanceof Form) {
            $data = $data->getData();
        }
        
        //$from    = $data['email'];
        $subject = '[Contact Form] ' . $data['subject'];
        //$body    = $data['body'];

        $data = [
            'sender'    => [
                'name'      => $data['name'],
                'address'   => $data['email']
            ],
            'body'      => $data['body'],
            'subject'   => $subject,
            'transport' => 'default',
        ];

        $this->getEventManager()->trigger('mail.send', $this, $data);
    }

    /**
     * @param null $data
     * @return mixed
     */
    public function getContactForm($data=null)
    {
        $sl = $this->getServiceLocator();
        $formManager = $sl->get('FormElementManager');
        
        $form = $formManager->get('UthandoContact\Form\Contact');
        $form->setInputFilter($sl->get('UthandoContact\InputFilter\Contact'));
        $form->init();
        
        if ($data) {
            $form->setData($data);
        }
        
        return $form;
    }
}
