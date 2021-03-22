<?php
namespace AHT\Testimonials\Model;

use AHT\Testimonials\Api\Data;
use AHT\Testimonials\Api\TestimonialsRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use AHT\Testimonials\Model\ResourceModel\Testimonials as ResourceTestimonials;
use AHT\Testimonials\Model\ResourceModel\Testimonials\CollectionFactory as TestimonialsCollectionFactory;

/**
 * Class TestimonialsRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TestimonialsRepository implements TestimonialsRepositoryInterface
{
    /**
     * @var ResourceTestimonials
     */
    protected $resource;

    /**
     * @var TestimonialsFactory
     */
    protected $TestimonialsFactory;

    /**
     * @var TestimonialsCollectionFactory
     */
    protected $TestimonialsCollectionFactory;

    /**
     * @var Data\TestimonialsSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourceTestimonials $resource
     * @param TestimonialsFactory $TestimonialsFactory
     * @param Data\TestimonialsInterfaceFactory $dataTestimonialsFactory
     * @param TestimonialsCollectionFactory $TestimonialsCollectionFactory
     * @param Data\TestimonialsSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourceTestimonials $resource,
        TestimonialsFactory $TestimonialsFactory,
        // Data\TestimonialsInterfaceFactory $dataTestimonialsFactory,
        TestimonialsCollectionFactory $TestimonialsCollectionFactory
    ) {
        $this->resource = $resource;
        $this->TestimonialsFactory = $TestimonialsFactory;
        $this->TestimonialsCollectionFactory = $TestimonialsCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Testimonials data
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Testimonials
     * @return Testimonials
     * @throws CouldNotSaveException
     */
    public function save(\AHT\Testimonials\Api\Data\TestimonialsInterface $testimonials)
    {

        try {
            $this->resource->save($testimonials);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Testimonials: %1', $exception->getMessage()),
                $exception
            );
        }
        return $testimonials;
    }

    /**
     * Load Testimonials data by given Testimonials Identity
     *
     * @param string $TestimonialsId
     * @return Testimonials
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($testimonialsId)
    {
        $testimonials = $this->TestimonialsFactory->create();
        $testimonials->load($testimonialsId);
        if (!$testimonials->getId()) {
            throw new NoSuchEntityException(__('The CMS Testimonials with the "%1" ID doesn\'t exist.', $testimonialsId));
        }
        return $testimonials;
    }

    /**
     * Load Testimonials data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \AHT\Testimonials\Api\Data\TestimonialsSearchResultsInterface
     */
    public function getList()
    {
        /** @var \AHT\Testimonials\Model\ResourceModel\Testimonials\Collection $collection */
        $collection = $this->TestimonialsCollectionFactory->create();
        return $collection;
    }

    /**
     * Delete Testimonials
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Testimonials
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\AHT\Testimonials\Api\Data\TestimonialsInterface $testimonials)
    {
        try {
            $this->resource->delete($testimonials);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Testimonials: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete Testimonials by given Testimonials Identity
     *
     * @param string $testimonialsId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($testimonialsId)
    {
        return $this->delete($this->getById($testimonialsId));
    }
}