<?php
namespace UthandoContact\Service;

use Zend\Captcha\Factory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CaptchaFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config  = $serviceLocator->get('config');
        
        $spec = $config['contact']['captcha'];
        
        if ('image' === $spec['class']) {
            $plugins = $serviceLocator->get('ViewHelperManager');
            $urlHelper = $plugins->get('url');
        
            $font = $spec['options']['font'];
        
            if (is_array($font)) {
                $rand = array_rand($font);
                $randFont = $font[$rand];
                $font = $randFont;
            }
        
            $spec['options']['font'] = join('/', [
                $spec['options']['fontDir'],
                $font
            ]);
        
            $spec['options']['imgUrl'] = $urlHelper('contact/captcha-form-generate');
        }
        
        $captcha = Factory::factory($spec);
        
        return $captcha;
    }
}
