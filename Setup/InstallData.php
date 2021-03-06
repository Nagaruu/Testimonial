<?php

namespace AHT\Testimonials\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            [
                'name'         => 'How to Create SQL Setup Script in Magento 2',
                'id'       => '/hi',
            ],
         
        ];

        foreach ($data as $value) {
            $setup->getConnection()->insertForce($setup->getTable('aht_testimonials'), $value);
        }
    }
}