<?php

namespace App\Service\ProductCategory;

use App\Service\BaseService;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;

class ProductCategoryService extends BaseService implements ProductCategoryServiceInterface
{
    public $repository;

    public function __construct(ProductCategoryRepositoryInterface $ProductCategoryRepository)
    {
        $this->repository = $ProductCategoryRepository;
    }

    // Triển khai các phương thức từ ProductCategoryServiceInterface ở đây
}