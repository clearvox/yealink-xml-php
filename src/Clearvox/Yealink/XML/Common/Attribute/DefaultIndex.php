<?php
namespace Clearvox\Yealink\XML\Common\Attribute;

trait DefaultIndex
{
    /**
     * @var int
     */
    protected $defaultIndex = 1;

    /**
     * Position of the cursor when opening the XML object. If no number
     * is specified or a number greater than selectable then the default
     * value is 1.
     *
     * @param $defaultIndex
     * @return $this
     */
    public function setDefaultIndex($defaultIndex)
    {
        $this->defaultIndex = $defaultIndex;
        return $this;
    }
}