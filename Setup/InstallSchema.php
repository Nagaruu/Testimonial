<?php

namespace AHT\Testimonials\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements InstallSchemaInterface {
	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup,
		\Magento\Framework\Setup\ModuleContextInterface $context) {
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('AHT_Testimonials_post')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('AHT_Testimonials_post')
			)
				->addColumn(
				'id',
				\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
				null,
				[
					'identity' => true,
					'nullable' => false,
					'primary'  => true,
					'unsigned' => true,
				],
				'ID'
			)
				->addColumn(
				'name',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable => false'],
				'Name'
			)
                ->addColumn(
				'email',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable => false'],
				'Email'
			)
                ->addColumn(
				'designation',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable => false'],
				'Designation'
			)
                ->addColumn(
				'message',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable => false'],
				'Message'
			)
                ->addColumn(
				'contact',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				255,
				['nullable => false'],
				'Contact'
			)
				->setComment('Testimonial Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('AHT_Testimonials_post'),
				$setup->getIdxName(
					$installer->getTable('AHT_Testimonials_post'),
					['name'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}
