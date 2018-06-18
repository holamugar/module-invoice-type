<?php

namespace Mugar\InvoiceType\Model\Config\Source;

class DocumentType extends \Magento\Eav\Model\Entity\Attribute\Source\Config
{

    public function __construct()
    {
        $values = [
            ['value' => 'dni', 'label' => __('DNI')],
            ['value' => 'cuit', 'label' => __('CUIT')],
            ['value' => 'cuil', 'label' => __('CUIL')]
        ];
        parent::__construct($values);
    }
}