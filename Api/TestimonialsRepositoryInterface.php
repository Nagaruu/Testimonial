<?php
namespace AHT\Testimonials\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface TestimonialsRepositoryInterface
{
    /**
     * Save Post.
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Post
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\AHT\Testimonials\Api\Data\TestimonialsInterface $Post);

    /**
     * Retrieve Post.
     *
     * @param int $PostId
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($PostId);

    /**
     * Retrieve Posts matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AHT\Testimonials\Api\Data\PostSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    // public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Post.
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $Post
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\AHT\Testimonials\Api\Data\TestimonialsInterface $Post);

    /**
     * Delete Post by ID.
     *
     * @param int $PostId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($PostId);
}