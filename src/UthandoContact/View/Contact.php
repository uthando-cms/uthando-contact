<?php
namespace UthandoContact\View;

use UthandoCommon\View\AbstractViewHelper;

class Contact extends AbstractViewHelper
{
    public function __invoke()
    {
        $config = $this->getConfig('contact');
           
        return $config;
    }
}
