<?php

namespace App\Service\Product;

use App\Service\BaseService;
use App\Repositories\Product\ProductRepositoryInterface; // Thêm dòng này


class ProductService extends BaseService implements ProductServiceInterface
{

    public $repository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function find(int $id)
    {
        $product = $this->repository->find($id);
        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(), 'rating'));
        $countRating = count($product->productComments);

        if ($countRating != 0) {
            $avgRating = $sumRating / $countRating;
        }

        $product->$avgRating =$avgRating;
        return $product;
    }

    public function getRelateProducts($product, $limit =4){
      return  $this->repository->getRaltedProducts($product,$limit);
    }

    public function getFeaturedProducts()
    {
        return [
            "men"=>$this->repository->getFeaturedProductsByCategory(1),
            "women"=>$this->repository->getFeaturedProductsByCategory(2),
        ];
    }

    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);
    }

    public function getProductByCategory($categoryName, $request)
    {
        return $this->repository->getProductByCategory($categoryName, $request);
    }
    
}
