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
use Zend\View\Model\ViewModel;

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

        $emailView = new ViewModel([
            'data' => $data,
        ]);

        $emailView->setTemplate('uthando-contact/email-template/default-content');

        $this->getEventManager()->trigger('mail.send', $this, [
            'sender' => [
                'name'      => $data['name'],
                'address'   => $data['email']
            ],
            'layout'            => 'uthando-contact/email-template/default-layout',
            'layout_params'     => [],
            'body'              => $emailView,
            'subject'           => '[Contact Form] ' . $data['subject'],
            'transport'         => $data['transport'],
        ]);

        if ($formOptions->getSendCopyToSender()) {

            $emailView->setTemplate('uthando-contact/email-template/default-sender-copy');

            $this->getEventManager()->trigger('mail.send', $this, [
                'recipient' => [
                    'name' => $data['name'],
                    'address' => $data['email']
                ],

                'layout'            => 'uthando-contact/email-template/default-layout',
                'layout_params'     => [],
                'body'              => $emailView,
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
}
