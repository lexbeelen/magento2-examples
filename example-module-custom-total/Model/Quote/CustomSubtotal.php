<?php


namespace Example\CustomTotal\Model\Quote;

/**
 * Class CustomCustomTotal
 * @package Magecomp\Extrafee\Model\Total
 */
class CustomSubtotal extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

    /**
     * CustomCustomTotal constructor.
     */
    public function __construct()
    {
        $this->setCode('customsubtotal');
    }

    /**
     * Fetch
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @return array
     */
    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        $amount = 0;

        foreach ($quote->getItems() as $item) {
            $amount = $amount + ($item->getProduct()->getPrice() - $item->getProduct()->getFinalPrice());
        }

        $amount = $quote->getSubtotal() + $amount;

        return [
            'code' => $this->getCode(),
            'title' => __('Subtotal'),
            'value' => $amount
        ];
    }
}
