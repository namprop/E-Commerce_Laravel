<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Product\ProductServiceInterface;
use App\Service\Blog\BlogServiceInterface;
class HomeController extends Controller
{
    private $productService;
    private $blogService;



    public function __construct(ProductServiceInterface $productService , BlogServiceInterface $blogService)
    {
        $this->productService = $productService;
        $this->blogService = $blogService;
    }
    public function index()
    {
        $featuredProducts = $this->productService->getFeaturedProducts();

        $getLatesBlogs = $this->blogService->getLatesBlogs();

        return view('front.shop.home', compact('featuredProducts','getLatesBlogs'));
    }
}
