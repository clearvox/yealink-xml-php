<?php
namespace Clearvox\Yealink\XML\Common;

use Clearvox\Yealink\XML\XMLObjectInterface;

class Prompt implements XMLObjectInterface
{
    /**
     * @var string
     */
    protected $prompt;

    public function __construct($prompt)
    {
        $this->prompt = $prompt;
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

        $prompt = $tempDOM->createElement('Prompt');
        $prompt->appendChild($tempDOM->createTextNode($this->prompt));

        unset($tempDOM);
        return $prompt;
    }
}