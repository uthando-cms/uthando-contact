<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Controller
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @link      https://github.com/uthando-cms for the canonical source repository
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\Controller;

use UthandoContact\ServiceManager\ContactService;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class ContactController
 *
 * @package UthandoContact\Mvc\Controller
 */
class ContactController extends AbstractActionController
{
    /**
     * @return array
     */
    public function indexAction()
    {
        $form = $this->getServiceLocator()
            ->get(ContactService::class)
            ->getContactForm();

        return ['form' => $form];
    }

    /**
     * @return Response|ViewModel
     */
    public function processAction()
    {
        if (!$this->getRequest()->isPost()) {
            return $this->redirect()->toRoute('contact');
        }

        /* @var ContactService $service */
        $service = $this->getServiceLocator()->get(ContactService::class);

        $form = $service->getContactForm($this->params()->fromPost());

        if (!$form->isValid()) {
            $this->flashMessenger()->addInfoMessage(
                'There were one or more issues with your submission. Please correct them as indicated below.'
            );

            $model = new ViewModel([
                'form' => $form
            ]);

            $model->setTemplate('uthando-contact/controller/contact/index');

            return $model;
        }

        // send email...
        $service->sendEmail($form);

        return $this->redirect()->toRoute('contact/thank-you');
    }

    /**
     * @return array|Response
     */
    public function thankYouAction()
    {
        $headers = $this->getRequest()->getHeaders();

        if (!$headers->has('Referer')
            || !preg_match('#/contact$#', $headers->get('Referer')->getFieldValue())
        ) {
            return $this->redirect()->toRoute('contact');
        }

        return [];
    }
}
