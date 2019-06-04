<?php


namespace Example\CustomTotal\Model\Quote;

/**
 * Class CustomTotal
 * @package Example\CustomTotal\Model\Quote
 */
class CustomTotal extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{

    /**
     * CustomCustomTotal constructor.
     */
    public function __construct()
    {
        $this->setCode('customtotaldiscount');
    }

    /**
     * Fetch Data
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

        if ($amount) {
            return [
                'code' => $this->getCode(),
                'title' => __('Discount'),
                'value' => -$amount
            ];
        }

        return null;
    }
}
