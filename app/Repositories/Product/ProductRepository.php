<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getRaltedProducts($product, $limit = 4)
    {
        return $this->model->where('product_category_id', $product->product_category_id)
            ->where('tag', $product->tag)
            ->limit($limit)
            ->get();
    }

    public function getFeaturedProductsByCategory(int $categoryId)
    {
        return $this->model->where('featured', true)->where('product_category_id', $categoryId)
            ->get();
    }

    public function getProductOnIndex($request)
    {

        $search = $request->search ?? '';

        $products = $this->model->where('name', 'like', '%' . $search . '%');
        $products = $this->filter($products, $request);
        $products = $this->sortAnPagination($products, $request);

        return $products;
    }

    public function getProductByCategory($categoryName, $request)
    {
        $category = ProductCategory::where('name', $categoryName)->first();

        if (!$category) {
            return collect();
        }
        $products = $category->products()->toQuery();
        $products = $this->filter($products, $request);
        $products = $this->sortAnPagination($products, $request);

        return $products;
    }

   
private function sortAnPagination($products, Request $request)
{
    $perPage = $request->show ?? 6;
    $sortBy = $request->sort_by ?? 'latest';

    switch ($sortBy) {
        case 'latest':
            $products = $products->orderByDesc('id');
            break;
        case 'oldest':
            $products = $products->orderBy('id');
            break;
        case 'name-ascending':
            $products = $products->orderBy('name');
            break;
        case 'name-descending':
            $products = $products->orderByDesc('name');
            break;
        case 'price-ascending':
            $products = $products->orderBy('price');
            break;
        case 'price-descending':
            $products = $products->orderByDesc('price');
            break;
        default:
            $products = $products->orderByDesc('id');
            break;
    }

    $products = $products->paginate($perPage);
    $products->appends(['sort_by' => $sortBy, 'show' => $perPage]);
    return $products;
}

    private function filter($products, $request)
    {
        //Brand
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);
        $products = $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;

        return $products;
    }
}
