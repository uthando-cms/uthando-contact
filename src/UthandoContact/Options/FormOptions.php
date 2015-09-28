<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * Class FormOptions
 *
 * @package UthandoContact\Options
 */
class FormOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $transportList;

    /**
     * @var bool
     */
    protected $sendCopyToSender;

    /**
     * @var bool
     */
    protected $enableCaptcha;

    /**
     * @var bool
     */
    protected $enableAkismet;

}
