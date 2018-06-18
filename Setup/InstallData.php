<?php

namespace Mugar\InvoiceType\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Customer\Setup\CustomerSetupFactory;
use Mugar\InvoiceType\Model\Config\Source\DocumentType;

class InstallData implements InstallDataInterface
{

    /**
     * Customer setup factory
     *
     * @var CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * Init
     *
     * @param CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * {@inheritdoc}
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {

        // Start Setup
        $setup->startSetup();

        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer_address');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        $customerSetup
            ->addAttribute('customer_address', 'document_type', [
                'type' => 'varchar',
                'label' => 'Document Type',
                'input' => 'select',
                'source' => DocumentType::class,
                'required' => false,
                'visible' => true,
                'visible_on_front' => false,
                'user_defined' => false,
                'sort_order' => 600,
                'position' => 600,
                'system' => 0,
            ])
            ->addAttribute('customer_address', 'document_number', [
                'type' => 'varchar',
                'label' => 'Document Number',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'visible_on_front' => false,
                'user_defined' => false,
                'sort_order' => 650,
                'position' => 650,
                'system' => 0,
                'validate_rules' => 'a:1:{s:15:"max_text_length";i:12;}', // TODO: check validations
            ]);

        $customerSetup->getEavConfig()->getAttribute('customer_address', 'document_type')
            ->addData(['used_in_forms' => ['adminhtml_customer_address']])->save();
        $customerSetup->getEavConfig()->getAttribute('customer_address', 'document_number')
            ->addData(['used_in_forms' => ['adminhtml_customer_address']])->save();


        // End Setup
        $setup->endSetup();


    }
}
