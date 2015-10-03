<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\Options;

use UthandoContact\Model\AddressLinesCollection;
use UthandoContact\Model\BusinessHoursCollection;
use Zend\Stdlib\AbstractOptions;
use Zend\Stdlib\Exception\InvalidArgumentException;

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
     * @var AddressLinesCollection
     */
    protected $address;

    /**
     * @var string
     */
    protected $phoneRegion;

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
     * @var BusinessHoursCollection
     */
    protected $businessHours;

    /**
     * @var string
     */
    protected $aboutUsText;

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
     * @return AddressLinesCollection
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $addressLines
     * @return $this
     * @throws InvalidArgumentException
     */
    public function setAddress($addressLines)
    {
        if (is_array($addressLines)) {
            $addressLines = new AddressLinesCollection($addressLines);
        }

        if (!$addressLines instanceof AddressLinesCollection) {
            throw new InvalidArgumentException(
                'you must only use an array or an instance of UthandoContact\Model\AddressLinesCollection'
            );
        }

        $this->address = $addressLines;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneRegion()
    {
        return $this->phoneRegion;
    }

    /**
     * @param string $phoneRegion
     * @return $this
     */
    public function setPhoneRegion($phoneRegion)
    {
        $this->phoneRegion = $phoneRegion;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return $this
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     * @return $this
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return BusinessHoursCollection
     */
    public function getBusinessHours()
    {
        return $this->businessHours;
    }

    /**
     * @param BusinessHoursCollection $businessHours
     * @return $this
     */
    public function setBusinessHours($businessHours)
    {
        if (is_array($businessHours)) {
            $businessHours = new BusinessHoursCollection($businessHours);
        }

        if (!$businessHours instanceof BusinessHoursCollection) {
            throw new InvalidArgumentException(
                'you must only use an array or an instance of UthandoContact\Model\BusinessHoursCollection'
            );
        }

        $this->businessHours = $businessHours;

        return $this;
    }

    /**
     * @return string
     */
    public function getAboutUsText()
    {
        return $this->aboutUsText;
    }

    /**
     * @param string $aboutUsText
     * @return $this
     */
    public function setAboutUsText($aboutUsText)
    {
        $this->aboutUsText = $aboutUsText;
        return $this;
    }
}
