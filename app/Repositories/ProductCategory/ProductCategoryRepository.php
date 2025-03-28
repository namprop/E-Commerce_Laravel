<?php


namespace App\Repositories\ProductCategory;

use App\Repositories\BaseRepository;

use App\Models\ProductCategory;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{
    public function getModel()
    {
        return ProductCategory::class;
    }
}