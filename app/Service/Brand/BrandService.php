<?php

namespace App\Service\Brand;

use App\Service\BaseService;
use App\Repositories\Brand\BrandRepositoryInterface;

class BrandService extends BaseService implements BrandServiceInterface
{
    public $repository;

    public function __construct(BrandRepositoryInterface $BrandRepository)
    {
        $this->repository = $BrandRepository;
    }

    // Triển khai các phương thức từ BrandServiceInterface ở đây
}