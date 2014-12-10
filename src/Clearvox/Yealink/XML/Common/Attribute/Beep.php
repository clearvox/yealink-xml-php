<?php
namespace Clearvox\Yealink\XML\Common\Attribute;

/**
 * The XML object can Beep!
 *
 * @category Clearvox
 * @package Yealink
 * @subpackage XML\Common\Attribute
 * @author Leon Rowland <leon@rowland.nl>
 */
trait Beep
{
    /**
     * @var bool
     */
    protected $beep = true;

    /**
     * Specifies that a beep from the phone will be triggered
     * when opening this XML object.
     *
     * @return $this
     */
    public function doBeep()
    {
        $this->beep = true;
        return $this;
    }

    /**
     * Specifies not to beep the phone when this XML object
     * is opened.
     *
     * @return $this
     */
    public function dontBeep()
    {
        $this->beep = false;
        return $this;
    }
}