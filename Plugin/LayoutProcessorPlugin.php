<?php

namespace Mugar\InvoiceType\Plugin;

class LayoutProcessorPlugin
{
    const XPATH_INVOICE_TYPE_GROUP = 'mugar_invoice_type_config/mugar_invoice_type_group/';

    /**
     * Core store config
     *
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->logger = $logger;
    }

    private function getComponent($label)
    {
        // TODO: Test input
        $selectTypeField = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'billingAddress.custom_attributes',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
            ],
            'provider' => 'checkoutProvider',
            'dataScope' => 'billingAddress.custom_attributes.text_field',
            'label' => __($label),
            'sortOrder' => 250,
            'visible' => true,
            'id' => 'invoice-type',
            'validation' => [
                'required-entry' => true,
            ],
        ];
        return $selectTypeField;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject, array  $jsLayout)
    {
        if($this->scopeConfig->getValue(self::XPATH_INVOICE_TYPE_GROUP.'enable_invoice_selector') != 1) {
            return $jsLayout;
        }

        // Add filed to address
        $configuration = $jsLayout['components']['checkout']['children']['steps']['children']
                ['billing-step']['children']['payment']['children']['payments-list']['children'];

        foreach ($configuration as $paymentGroup => $groupConfig) {
            // TODO: Test custom input in billing-address
            if (isset($groupConfig['component']) AND $groupConfig['component'] === 'Magento_Checkout/js/view/billing-address') {
                $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
                ['payment']['children']['payments-list']['children'][$paymentGroup]
                ['children']['form-fields']['children']['invoice_type_field'] = $this->getComponent('dentro del address');
            }
            $this->logger->log('DEBUG', 'Array group',
                $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
                ['payment']['children']['payments-list']['children'][$paymentGroup]
            );
        }

        // vendor/magento/module-checkout/view/frontend/web/js/view/review/actions/default.js

        // TODO: Test -> Add field after payment methods
        $selectInvoiceTypeCode = 'invoiceTypeForm';
        if(isset($jsLayout['components']['checkout']['children']['steps']['children']
            ['billing-step']['children']['payment']['children']
            ['afterMethods']['children']['invoice-type-container']['children'])) {

            $jsLayout['components']['checkout']['children']['steps']['children']
            ['billing-step']['children']['payment']['children']
            ['afterMethods']['children']['invoice-type-container']['children'][$selectInvoiceTypeCode] = $this->getComponent('despues de la orden');
        }


        return $jsLayout;
    }
}