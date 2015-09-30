<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Options
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContact\Options;

use UthandoContact\Model\AddressLinesCollection;
use Zend\Stdlib\AbstractOptions;
use Zend\Stdlib\Exception\InvalidArgumentException;

/**
 * Class CompanyOptions
 *
 * @package UthandoContact\Options
 */
class CompanyOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var AddressLinesCollection
     */
    protected $address;

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
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
}
