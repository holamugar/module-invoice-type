<?php

namespace Mugar\InvoiceType\Model\Config\Source;

class InvoiceType implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'a', 'label' => __('A')],
            ['value' => 'b', 'label' => __('B')],
            ['value' => 'c', 'label' => __('C')],
            ['value' => 'e', 'label' => __('E')],
            ['value' => 'm', 'label' => __('A con leyenda M')],
        ];
    }
}