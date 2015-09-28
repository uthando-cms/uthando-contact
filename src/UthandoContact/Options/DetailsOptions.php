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
 * Class DetailsOptions
 *
 * @package UthandoContact\Options
 */
class DetailsOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $address;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $fax;

    /**
     * @var string
     */
    protected $mobile;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var array
     */
    protected $businessHours;
}
