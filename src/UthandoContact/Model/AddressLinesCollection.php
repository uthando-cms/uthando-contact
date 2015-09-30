<?php
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2015 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE
 */

namespace UthandoContact\Model;

use UthandoCommon\Model\AbstractCollection;
use UthandoCommon\Model\CollectionException;

/**
 * Class AddressLinesCollection
 *
 * @package UthandoContact\Model
 * @method AbstractLine offsetGet($key)
 */
class AddressLinesCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $entityClass = 'UthandoContact\Model\AbstractLine';

    /**
     * @param array $array
     */
    public function __construct($array = [])
    {
        $this->addAddressLines($array);
    }

    /**
     * @param array $addressLines
     */
    public function addAddressLines(array $addressLines)
    {
        foreach ($addressLines as $line) {
            $this->addAddressLine($line);
        }
    }

    /**
     * @param $addressLine
     * @return $this
     * @throws CollectionException
     */
    public function addAddressLine($addressLine)
    {
        if ($addressLine instanceof AbstractLine) {
            $this->add($addressLine);
        }

        if (is_array($addressLine)) {
            $addressLine = new $this->entityClass($addressLine);
            $this->add($addressLine);
        }

        return $this;
    }
}
