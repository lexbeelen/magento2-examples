<?php

namespace Example\ViewModel\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class ProductList
 * @package Example\ViewModel
 */
class ProductList implements ArgumentInterface
{

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * ProductList constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * Get All Products
     * @return \Magento\Catalog\Api\Data\ProductInterface[]
     */
    public function getAllProducts()
    {
        return $this->productRepository->getList($this->searchCriteriaBuilder->create())->getItems();
    }
}
