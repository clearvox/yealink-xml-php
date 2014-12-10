<?php
namespace Clearvox\Yealink\XML\Common\Attribute;

/**
 * If there is no operation at a fixed interval
 * on the phone, the phone will automatically exit the XML Object.
 *
 * If timeout is set to 0, the phone will not exit until the softkey
 * for Exit has been pressed.
 *
 * @category Clearvox
 * @package Yealink
 * @subpackage XML\Common\Attribute
 * @author Leon Rowland <leon@rowland.nl>
 */
trait Timeout
{
    /**
     * @var int
     */
    protected $timeout;

    /**
     * Set the timeout for the XML Object. Set to 0 overrides
     * the timeout.
     *
     * @param $seconds
     * @return $this
     */
    public function setTimeout($seconds)
    {
        $this->timeout = $seconds;
        return $this;
    }
}