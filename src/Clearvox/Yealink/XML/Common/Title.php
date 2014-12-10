<?php
namespace Clearvox\Yealink\XML\Common;

use Clearvox\Yealink\XML\XMLObjectInterface;

class Title implements XMLObjectInterface
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var bool
     */
    protected $wrap;

    /**
     * The title of the XML Object. Ensure the XML object
     * support Title.
     *
     * Whether the title should wrap to more than 1 line.
     *
     * @param $title
     * @param bool $wrap
     */
    public function __construct($title, $wrap = true)
    {
        $this->title = $title;
        $this->wrap = $wrap;
    }

    /**
     * Returns the DOMElement that the implemented
     * class represents.
     *
     * @return \DOMElement
     */
    public function generate()
    {
        $tempDOM = new \DOMDocument();

        $title = $tempDOM->createElement('Title');
        $title->appendChild($tempDOM->createTextNode($this->title));

        $title->setAttribute('wrap', ($this->wrap) ? 'yes' : 'no');

        unset($tempDOM);
        return $title;
    }
}