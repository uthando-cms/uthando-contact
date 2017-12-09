<?php declare(strict_types=1);
/**
 * Uthando CMS (http://www.shaunfreeman.co.uk/)
 *
 * @package   UthandoContact\Model
 * @author    Shaun Freeman <shaun@shaunfreeman.co.uk>
 * @copyright Copyright (c) 2014 Shaun Freeman. (http://www.shaunfreeman.co.uk)
 * @license   see LICENSE.txt
 */

namespace UthandoContact\Model;

use UthandoCommon\Model\Model;
use UthandoCommon\Model\ModelInterface;

/**
 * Class AbstractLine
 *
 * @package UthandoContact\Model
 */
class AbstractLine implements ModelInterface
{
    use Model;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $text;

    /**
     * @param array $array
     */
    public function __construct(array $array = [])
    {
        if (isset($array['label'])) {
            $this->setLabel($array['label']);
        }

        if (isset($array['text'])) {
            $this->setText($array['text']);
        }
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
}
