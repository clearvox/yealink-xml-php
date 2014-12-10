<?php
namespace Clearvox\Yealink\XML\TextMenu;

use Clearvox\Yealink\XML\Common\Prompt;
use Clearvox\Yealink\XML\XMLObjectInterface;

/**
 *
 *
 * @category Clearvox
 * @package Yealink
 * @subpackage XML\TextMenu
 * @author Leon Rowland <leon@rowland.nl>
 */
class MenuItem implements XMLObjectInterface
{
    /**
     * @var Prompt
     */
    protected $prompt;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var string
     */
    protected $dial;

    /**
     * @var string
     */
    protected $selection;

    /**
     * Build a new menu item, with the Prompt title label and
     * the URI to go to for this Item.
     *
     * @param Prompt $prompt
     * @param string $uri
     */
    public function __construct(Prompt $prompt, $uri)
    {
        $this->prompt = $prompt;
        $this->uri    = $uri;
    }

    /**
     * Define the number to be dialed when an off hook action
     * is performed or the Send softkey is pressed.
     *
     * @param string $number
     * @return $this
     */
    public function setDial($number)
    {
        $this->dial = $number;
        return $this;
    }

    /**
     * If URI is set to a HTTP URL, the phone will send the request
     * with selection=xxx.
     *
     * You could then append query strings to the end of the URI.
     *
     * @param string $selection
     * @return $this
     */
    public function setSelection($selection)
    {
        $this->selection = $selection;
        return $this;
    }

    /**
     * Returns the DOMElement that the implemented
     * class represents.
     *
     * @return \DOMElement
     */
    public function generate()
    {
        $tempDOM = new \DomDocument();
        $menuItem = $tempDOM->createElement('MenuItem');

        $menuItem->appendChild($tempDOM->importNode($this->prompt->generate(), true));

        $uri = $tempDOM->createElement('URI');
        $uri->appendChild($tempDOM->createTextNode($this->uri));
        $menuItem->appendChild($uri);

        if (isset($this->dial)) {
            $dial = $tempDOM->createElement('Dial');
            $dial->appendChild($tempDOM->createTextNode($this->dial));

            $menuItem->appendChild($dial);
        }

        unset($tempDOM);
        return $menuItem;
    }
}