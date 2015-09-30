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

use UthandoContact\Model\TransportListCollection;
use Zend\Stdlib\AbstractOptions;
use Zend\Stdlib\Exception\InvalidArgumentException;

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
     * @var TransportListCollection
     */
    protected $transportList;

    /**
     * @var bool
     */
    protected $sendCopyToSender = false;

    /**
     * @var bool
     */
    protected $enableCaptcha = false;

    /**
     * @var bool
     */
    protected $enableAkismet = false;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return TransportListCollection
     */
    public function getTransportList()
    {
        return $this->transportList;
    }

    /**
     * @param TransportListCollection $transportList
     * @return $this
     */
    public function setTransportList($transportList)
    {
        if (is_array($transportList)) {
            $transportList = new TransportListCollection($transportList);
        }

        if (!$transportList instanceof TransportListCollection) {
            throw new InvalidArgumentException(
                'you must only use an array or an instance of UthandoContact\Model\TransportListCollection'
            );
        }

        $this->transportList = $transportList;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSendCopyToSender()
    {
        return $this->sendCopyToSender;
    }

    /**
     * @param boolean $sendCopyToSender
     * @return $this
     */
    public function setSendCopyToSender($sendCopyToSender)
    {
        $this->sendCopyToSender = (bool) $sendCopyToSender;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableCaptcha()
    {
        return $this->enableCaptcha;
    }

    /**
     * @param boolean $enableCaptcha
     * @return $this
     */
    public function setEnableCaptcha($enableCaptcha)
    {
        $this->enableCaptcha = (bool) $enableCaptcha;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getEnableAkismet()
    {
        return $this->enableAkismet;
    }

    /**
     * @param boolean $enableAkismet
     * @return $this
     */
    public function setEnableAkismet($enableAkismet)
    {
        $this->enableAkismet = (bool) $enableAkismet;
        return $this;
    }
}
