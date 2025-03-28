<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getRaltedProducts($product,$limit = 4);

    public function getFeaturedProductsByCategory( int $categoryId);

    public function getProductOnIndex($request);

    public function getProductByCategory($categoryName, $request);
}
