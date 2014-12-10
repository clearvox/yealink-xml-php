<?php
namespace Clearvox\Yealink\XML\Common\Attribute;

/**
 * Whether to display the title of the menu item specified
 * by the Prompt parameter in multiple lines, when the content
 * of the title is more than 1 line.
 *
 * Default value wraps
 *
 * @category Clearvox
 * @package Yealink
 * @subpackage XML\Common\Attribute
 * @author Leon Rowland <leon@rowland.nl>
 */
trait WrapList
{
    /**
     * @var bool
     */
    protected $wrapList = true;

    /**
     * Do wrap the title prompt.
     *
     * @return $this
     */
    public function doWrap()
    {
        $this->wrapList = true;
        return $this;
    }

    /**
     * Don't wrap the title prompt.
     *
     * @return $this
     */
    public function dontWrap()
    {
        $this->wrapList = false;
        return $this;
    }
}