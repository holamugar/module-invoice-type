<?php

namespace Mugar\InvoiceType\Model\Config\Source;

class SellerCategory implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'resp', 'label' => __('Responsable Inscripto')],
            ['value' => 'mono', 'label' => __('Monotributista')],
            ['value' => 'exen', 'label' => __('Exento frente al IVA')]
        ];
    }
}