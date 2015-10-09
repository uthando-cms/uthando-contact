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

/**
 * Class BusinessHoursCollection
 *
 * @package UthandoContact\Model
 * @method AbstractLine offsetGet($key)
 */
class BusinessHoursCollection extends AbstractCollection
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
        $this->addBusinessHours($array);
    }

    /**
     * @param array $businessHours
     */
    public function addBusinessHours(array $businessHours)
    {
        foreach ($businessHours as $line) {
            $this->addBusinessHourLine($line);
        }
    }

    /**
     * @param $hourLine
     * @return $this
     */
    public function addBusinessHourLine($hourLine)
    {
        if ($hourLine instanceof AbstractLine) {
            $this->add($hourLine);
        }

        if (is_array($hourLine)) {
            $hourLine = new $this->entityClass($hourLine);
            $this->add($hourLine);
        }

        return $this;
    }
}
