<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Brand\BrandService;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductCategory\ProductCategoryService;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     private $productService;
     private $brandService;
     private $productCategoryService;

     public function __construct(ProductServiceInterface $productService, BrandServiceInterface $brandService, ProductCategoryServiceInterface $productCategoryService)
     {
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->productCategoryService = $productCategoryService;
     }

     
    public function index(Request $request)
    {
        //
        $keyword = $request->search ?? '';
        $products = $this->productService->searchAndPaginate('name',$keyword);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $brands = $this->brandService->all();
        $productCategories = $this->productCategoryService->all();

        return view('admin.product.create', compact('brands','productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['qty'] = 0;
        $product = $this->productService->create($data);

        return redirect('admin/product/' . $product->id);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $products = $this->productService->find($id);
        return view('admin.product.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $products = $this->productService->find($id);
        $brands = $this->brandService->all();
        $productCategories = $this->productCategoryService->all();
        
        return view('admin.product.edit', compact('products','brands','productCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->all();
        $this->productService->update($data, $id);

        return redirect('admin/product/' .$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->productService->delete($id);
        return redirect('admin/product');
    }
}
