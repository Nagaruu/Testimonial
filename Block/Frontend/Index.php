<?php

namespace AHT\Testimonials\Block\Frontend;


use Magento\Framework\View\Element\Template;

use AHT\Testimonials\Api\CustomerRepositoryInterface;


class Index extends \Magento\Framework\View\Element\Template
{
    protected $testimonialsColectionFactory;

    protected $customerFactory;

    protected $customerRepositoryFactory;

    protected $testimonialsFactory;

    protected $customerResourceFactory;

    // protected $testimonials;

    public function __construct(
        Template\Context $context,
        \AHT\Testimonials\Model\ResourceModel\Testimonials\CollectionFactory $testimonialsColectionFactory,
        \AHT\Testimonials\Model\TestimonialsFactory $testimonialsFactory,
        \AHT\Testimonials\Model\CustomerFactory $customerFactory,
        \AHT\Testimonials\Model\ResourceModel\CustomerFactory $customerResourceFactory,
        \AHT\Testimonials\Api\CustomerRepositoryInterface $customerRepositoryFactory,
        array $data = []
    )
    {
        $this->customerResourceFactory = $customerResourceFactory;
        $this->testimonialsColectionFactory = $testimonialsColectionFactory;
        $this->customerRepositoryFactory = $customerRepositoryFactory;
        $this->customerFactory = $customerFactory;
        $this->testimonialsFactory = $testimonialsFactory;
        parent::__construct($context, $data);
    }

    /**
     * Preparing global layout
     *
     * @return $this
     */
    protected function _prepareLayout() {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('testimonials Collection'));
        return $this;
    }

    public function getAll() {
        $collecion = $this->testimonialsColectionFactory->create();
        return $collecion;
    }

    public function getNameCustomer($id) {
        $customer = $this->customerFactory->create();
        $customerResource = $this->customerResourceFactory->create();
        $customerResource->load($customer,$id);

        return $customer['customer_name'];
    }

    public function getById($id) {
        $id = $this->getRequest()->getParams();
        $collection = $this->testimonialsColectionFactory->create();
        $collection->addFieldToFilter('id', $id);
        return $collection;
    }

    public function getCreate() {
            return $this->getUrl('testimonials/index/create');
    }

    public function getEdit() {
        return $this->getUrl('testimonials/index/edit');
    }
}