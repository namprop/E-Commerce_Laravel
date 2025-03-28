<?php

namespace App\Http\Controllers\Front;

use App\Models\Product; // Import model Product

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\Brand\BrandServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    private $productService;
    private $productCommentService;
    private $productCategoryService;
    private $brandService;


    // ProductCommentServiceInterface $productCommentService
    
    public function __construct(ProductServiceInterface $productService,
     ProductCommentServiceInterface $productCommentService,
     ProductCategoryServiceInterface $productCategoryService,
      BrandServiceInterface $brandService)        
    {
        $this->productService = $productService;
        $this->productCommentService =$productCommentService;
        $this->productCategoryService = $productCategoryService;
        $this->brandService = $brandService;
    }

    public function show(string $id)
    {
        // Tìm sản phẩm theo ID
        $product = $this->productService->find((int)$id);
        // Trả về view với dữ liệu sản phẩm

        $categories = $this->productCategoryService->all();

        $brands = $this->brandService->all();

        $product = Product::with('productImages')->find((int)$id);

        $relatedProducts = $this->productService->getRelateProducts($product);

        return view('front.shop.show', compact('product','relatedProducts','categories','brands'));
    }

    
    public function postComment(Request $request){

        $this->productCommentService->create($request->all());
        return redirect()->back();
    }
    
    public function index(Request $request)
    {
        $products = $this->productService->getProductOnIndex($request);
        $categories = $this->productCategoryService->all();

        $brands = $this->brandService->all();
        

        return view('front.shop.index', compact('products','categories','brands'));
       
    }

    public function category(string $categoryName, Request $request)
    {
        $categories = $this->productCategoryService->all();
        $products = $this->productService->getProductByCategory($categoryName, $request);
        $brands = $this->brandService->all();


        return view('front.shop.index', compact('products','categories','brands'));
    }



}
