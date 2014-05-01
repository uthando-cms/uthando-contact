<?php

namespace UthandoContact\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    public function indexAction()
    {
        $form = $this->getServiceLocator()
            ->get('UthandoContact\Service\Contact')
            ->getContactForm();
        
        return ['form' => $form];
    }
    
    public function processAction()
    {
        if (!$this->request->isPost()) {
            return $this->redirect()->toRoute('contact');
        }
        
        $service = $this->getServiceLocator()->get('UthandoContact\Service\Contact');
        
        $form = $service->getContactForm($this->params()->fromPost());
        
        if (!$form->isValid()) {
            $this->flashMessenger()->addInfoMessage(
                'There were one or more isues with your submission. Please correct them as indicated below.'
            );
            
            $model = new ViewModel([
                'form' => $form
            ]);
            
            $model->setTemplate('uthando-contact/contact/index');
            
            return $model;
        }
    
        // send email...
        $service->sendEmail($form);
    
        return $this->redirect()->toRoute('contact/thank-you');
    }
    
    public function thankYouAction()
    {
        $headers = $this->request->getHeaders();
        
        if (!$headers->has('Referer')
                || !preg_match('#/contact|process$#', $headers->get('Referer')->getFieldValue())
        ) {
            return $this->redirect()->toRoute('contact');
        }
    
        return [];
    }
}
