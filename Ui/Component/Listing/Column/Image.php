<?php

namespace AHT\Testimonials\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;


class Image extends \Magento\Ui\Component\Listing\Columns\Column
{


    /**
     * @var \lth\testimonials\Model\testimonials
     */
    protected $testimonials;
    protected $_storeManager;
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param \lth\testimonials\Model\testimonials $testimonials
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        \AHT\Testimonials\Model\Testimonials $testimonials,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
        $this->testimonials = $testimonials;
        $this->_storeManager = $storeManager;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {

        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                $testimonials = new \Magento\Framework\DataObject($item);
                $item[$fieldName . '_src'] = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA)."testimonials/index/".$testimonials['image'];
                $item[$fieldName . '_orig_src'] = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA)."testimonials/index/".$testimonials['image'];
                $item[$fieldName . '_link'] = $this->urlBuilder->getUrl("testimonials/index/edit",
                    ['id' => $testimonials['id']]
                );
                $item[$fieldName . '_alt'] = $testimonials['name'];
            }
        }

        return $dataSource;
    }
}