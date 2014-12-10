<?php
namespace Clearvox\Yealink\XML\TextMenu;

use Clearvox\Yealink\XML\Common\Attribute as Attributes;
use Clearvox\Yealink\XML\XMLObjectInterface;

class TextMenu implements XMLObjectInterface
{
    use Attributes\Beep;
    use Attributes\DefaultIndex;
    use Attributes\LockIn;
    use Attributes\Timeout;
    use Attributes\WrapList;

    /**
     * @var XMLObjectInterface[]
     */
    protected $items = array();

    /**
     * @var string
     */
    protected $style;

    /**
     * Add Items to go inside the YealinkIPPhoneTextMenu
     *
     * Currently supports:
     * - Title
     * - MenuItem
     * - SoftKey
     *
     * @param XMLObjectInterface $item
     * @return $this
     */
    public function addItem(XMLObjectInterface $item)
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * Return all items that will go inside the YealinkIPPhoneTextMenu
     * @return XMLObjectInterface[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Allowed options are 'numbered' or 'none'.
     * Default is 'numbered'
     *
     * @param string $style
     * @return $this
     */
    public function setStyle($style)
    {
        $validStyles = array(
            'numbered',
            'none'
        );

        if ( ! in_array($style, $validStyles)) {
            throw new \InvalidArgumentException("Must be of either 'numbered' or 'none'");
        }

        $this->style = $style;
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
        $tempDOM = new \DOMDocument();
        $textMenu = $tempDOM->createElement('YealinkIPPhoneTextMenu');

        foreach ($this->items as $item) {
            $textMenu->appendChild($tempDOM->importNode($item->generate(), true));
        }

        $textMenu->setAttribute('Beep', ($this->beep) ? 'yes' : 'no');
        $textMenu->setAttribute('defaultIndex', $this->defaultIndex);
        $textMenu->setAttribute('LockIn', ($this->lockIn) ? 'yes' : 'no');
        $textMenu->setAttribute('style', $this->style);

        unset($tempDOM);
        return $textMenu;
    }
}