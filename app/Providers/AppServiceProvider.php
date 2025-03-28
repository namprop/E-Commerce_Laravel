<?php

namespace App\Providers;

use App\Repositories\ProductComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Service\ProductComment\ProductCommentServiceInterface;
use App\Service\ProductComment\ProductCommentService;

use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\Product\ProductService;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Blog\BlogRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Service\Blog\BlogServiceInterface;
use App\Service\Blog\BlogService;

use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Service\ProductCategory\ProductCategoryServiceInterface;
use App\Service\ProductCategory\ProductCategoryService;

use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Brand\BrandService;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Service\User\UserServiceInterface;
use App\Service\User\UserService;


use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Service\Order\OrderServiceInterface;
use App\Service\Order\OrderService;

use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Service\OrderDetail\OrderDetailService;



use Illuminate\Support\Facades\View;
use App\Helper\Cart;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Product
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );

        //ProductComment
        $this->app->singleton(
            ProductCommentRepositoryInterface::class,
            ProductCommentRepository::class
        );

        $this->app->singleton(
            ProductCommentServiceInterface::class,
            ProductCommentService::class
        );

        //Blog
        $this->app->singleton(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );
        $this->app->singleton(
            BlogServiceInterface::class,
            BlogService::class
        );

        //ProductCategory
        $this->app->singleton(
            ProductCategoryRepositoryInterface::class,
            ProductCategoryRepository::class
        );
        $this->app->singleton(
            ProductCategoryServiceInterface::class,
            ProductCategoryService::class
        );

        //Brand
        $this->app->singleton(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );
        $this->app->singleton(
            BrandServiceInterface::class,
            BrandService::class
        );

        //User

        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
        );

            //Order
            $this->app->singleton(
                OrderRepositoryInterface::class,
                OrderRepository::class
            );
    
            $this->app->singleton(
                OrderServiceInterface::class,
                OrderService::class
            );

            $this->app->singleton(
                OrderDetailRepositoryInterface::class,
                OrderDetailRepository::class
            );
    
            $this->app->singleton(
                OrderDetailServiceInterface::class,
                OrderDetailService::class
            );
    }

    /**
     * Bootstrap any application services.
     */


    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('cart', new Cart());
        });
    }
}
