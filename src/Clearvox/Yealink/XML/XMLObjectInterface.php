<?php
namespace Clearvox\Yealink\XML;

/**
 * Interface XMLObjectInterface
 *
 * Implement this interface for each top level XML element
 *
 * @category Clearvox
 * @package Yealink
 * @subpackage XML
 * @author Leon Rowland <leon@rowland.nl>
 */
interface XMLObjectInterface
{
    /**
     * Returns the DOMElement that the implemented
     * class represents.
     *
     * @return \DOMElement
     */
    public function generate();
}