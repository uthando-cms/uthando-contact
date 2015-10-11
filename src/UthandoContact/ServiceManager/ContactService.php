<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Service
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContact\ServiceManager;

use UthandoCommon\Service\AbstractService;
use UthandoContact\Form\ContactForm as ContactForm;
use UthandoContact\InputFilter\ContactInputFilter as ContactInputFilter;
use Zend\Form\Form;

/**
 * Class ContactService
 *
 * @package UthandoContact\Service
 */
class ContactService extends AbstractService
{
    /**
     * @param $data
     * @return bool
     */
    public function sendEmail($data)
    {
        if ($data instanceof Form) {
            $data = $data->getData();
        }

        //$from    = $data['email'];
        $subject = '[ContactService Form] ' . $data['subject'];
        //$body    = $data['body'];

        $data = [
            'sender' => [
                'name' => $data['name'],
                'address' => $data['email']
            ],
            'body' => $data['body'],
            'subject' => $subject,
            'transport' => 'webmaster',
        ];

        $this->getEventManager()->trigger('mail.send', $this, $data);

        return true;
    }

    /**
     * @param null $data
     * @return mixed
     */
    public function getContactForm($data = null)
    {
        $sl = $this->getServiceLocator();
        $formManager = $sl->get('FormElementManager');
        $inputFilterManager = $sl->get('InputFilterManager');
        /* @var ContactInputFilter $inputFilter */
        $inputFilter = $inputFilterManager->get('UthandoContact\InputFilter\Contact');

        /* @var ContactForm $form */
        $form = $formManager->get('UthandoContact');
        $form->setInputFilter($inputFilter);
        $form->init();

        if ($data) {
            $form->setData($data);
        }

        return $form;
    }
}
