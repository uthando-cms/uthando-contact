<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContactTest\Form\View\Helper
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContactTest\Form\View\Helper;

use UthandoContactTest\Framework\ApplicationTestCase;

class AbstractLineFormCollectionTest extends ApplicationTestCase
{
    public function testCanGetFromServiceManager()
    {
        $viewHelper = $this->getApplicationServiceLocator()
            ->get('ViewHelperManager')
            ->get('AbstractLineFormCollection');

        $this->assertInstanceOf('UthandoContact\Form\View\Helper\AbstractLineFormCollection', $viewHelper);
    }

    public function testRender()
    {
        $testData = [
            'form' => [
                'name' => 'ContactForm',
                'send_copy_to_sender' => true,
                'enable_captcha' => false,
                'enable_akismet' => false,
                'transport_list' => [
                    0 => [
                        'label' => 'default',
                        'text' => 'General Enquiries (Shop and bead related inquiries)',
                    ],
                    1 => [
                        'label' => 'webmaster',
                        'text' => 'Webmaster (Technical problems and broken links)',
                    ],
                ],
            ],
        ];

        $form = $this->getApplicationServiceLocator()
            ->get('FormElementManager')
            ->get('UthandoContactSettings');

        $form->setData($testData);

        $viewHelper = $this->getApplicationServiceLocator()
            ->get('ViewHelperManager')
            ->get('AbstractLineFormCollection');

        $viewHelper->setLineType('transport-list');

        $html = $viewHelper($form->get('form')->get('transport_list'));

        $this->assertStringStartsWith('<table id="transport-list-table" class="table table-bordered table-condensed">', $html);
    }
}
