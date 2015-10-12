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
use UthandoContact\Form\ContactForm;
use UthandoContact\InputFilter\ContactInputFilter;
use UthandoContact\Options\DetailsOptions;
use UthandoContact\Options\FormOptions;
use Zend\Form\Form;

/**
 * Class ContactService
 *
 * @package UthandoContact\Service
 */
class ContactService extends AbstractService
{
    /**
     * @var FormOptions
     */
    protected $formOptions;

    /**
     * @param $data
     * @return bool
     */
    public function sendEmail($data)
    {
        if ($data instanceof Form) {
            $data = $data->getData();
        }

        $formOptions = $this->getFormOptions();
        $detailsOptions = $this->getDetailsOptions();

        $this->getEventManager()->trigger('mail.send', $this, [
            'sender' => [
                'name' => $data['name'],
                'address' => $data['email']
            ],
            'body' => $data['body'],
            'subject' => '[Contact Form] ' . $data['subject'],
            'transport' => $data['transport'],
        ]);

        if ($formOptions->getSendCopyToSender()) {
            $respondMessage = "Dear " . $data['name'] . ",<br /><br />We thank you for your enquiry and we will get back to you as soon as possible.<br /><br />" . $detailsOptions->getName();
            $respondMessage .= "<br /><br /> Here is a copy of your enquiry, for your records:<br /><br />";
            $respondMessage .= $data['body'];

            $this->getEventManager()->trigger('mail.send', $this, [
                'recipient' => [
                    'name' => $data['name'],
                    'address' => $data['email']
                ],

                'body' => $respondMessage,
                'subject' => '[ContactService Form] ' . $data['subject'],
                'transport' => $data['transport'],
            ]);
        }

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
        $formOptions = $this->getFormOptions();

        /* @var ContactForm $form */
        $form = $formManager->get('UthandoContact', [
            'name'              => $formOptions->getName(),
            'enable_captcha'    => $formOptions->getEnableCaptcha(),
            'transport_list'    => $formOptions->getTransportList(),
        ]);
        $form->setInputFilter($inputFilter);
        $form->init();

        if ($data) {
            $form->setData($data);
        }

        return $form;
    }

    /**
     * @return FormOptions
     */
    public function getFormOptions()
    {
        $sl = $this->getServiceLocator();
        return $sl->get('UthandoContact\Options\FormOptions');
    }

    /**
     * @return DetailsOptions
     */
    public function getDetailsOptions()
    {
        $sl = $this->getServiceLocator();
        return $sl->get('UthandoContact\Options\DetailsOptions');
    }
}
