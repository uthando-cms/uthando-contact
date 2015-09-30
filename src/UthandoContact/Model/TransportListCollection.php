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
 * Class TransportListCollection
 *
 * @package UthandoContact\Model
 * @method AbstractLine offsetGet($key)
 */
class TransportListCollection extends AbstractCollection
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
        $this->addTransportLines($array);
    }

    /**
     * @param array $transportLines
     */
    public function addTransportLines(array $transportLines)
    {
        foreach ($transportLines as $line) {
            $this->addTransportLine($line);
        }
    }

    /**
     * @param $transportLine
     * @return $this
     * @throws CollectionException
     */
    public function addTransportLine($transportLine)
    {
        if ($transportLine instanceof AbstractLine) {
            $this->add($transportLine);
        }

        if (is_array($transportLine)) {
            $transportLine = new $this->entityClass($transportLine);
            $this->add($transportLine);
        }

        return $this;
    }
}
