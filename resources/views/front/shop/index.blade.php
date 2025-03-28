@extends('front.layout.master')



@section('title', 'product')

@section('body')
    <!-- breacrumb section begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breacrumb section end -->



    <!-- product shop section begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">

               @include('front.shop.components.products-sidebar-fillter')

                </div>

                <div class="col-lg-9 arder-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">

                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" onchange="this.form.submit()" class="sorting">
                                            <option {{ request('sort_by') == 'latest' ? 'selected' : '' }} value="Latest">
                                                Sorting: Latest</option>
                                            <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">
                                                Sorting: Oldest</option>
                                            <option {{ request('sort_by') == 'name-ascending' ? 'selected' : '' }}
                                                value="name-ascending">Sorting: Name A-Z</option>
                                            <option {{ request('sort_by') == 'name-descending' ? 'selected' : '' }}
                                                value="name-descending">Sorting: Name Z-A</option>
                                            <option {{ request('sort_by') == 'price-ascending' ? 'selected' : '' }}
                                                value="price-ascending">Sorting: Price Ascending</option>
                                            <option {{ request('sort_by') == 'price-descending' ? 'selected' : '' }}
                                                value="price-descending">Sorting: Price Decrease</option>
                                        </select>
                                        <select name="show" onchange="this.form.submit()" class="p-show">
                                            <option {{ request('show') == '3' ? 'selected' : '' }} value="3">Show: 3
                                            </option>
                                            <option {{ request('show') == '9' ? 'selected' : '' }} value="9">Show: 9
                                            </option>
                                            <option {{ request('show') == '15' ? 'selected' : '' }} value="15">Show:
                                                15</option>
                                        </select>
                                    </div>
                                </form>

                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img 
                                            src="front/img/products/{{ $product->productImages[0]->path ?? '' }}" alt="">

                                            @if ($product->discount != null)
                                                <div class="sale pp-sale">Sale</div>
                                            @endif
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li class="w-icon active">
                                                        <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                                                <i class="icon_bag_alt"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li class="quick-view"><a href="shop/product/{{ $product->id }}">+
                                                            Quick View</a></li>
                                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="pi-text">
                                            <div class="catagory-name">{{ $product->tag }}</div>
                                            <a href="shop/product/{{ $product->id }}">
                                                <h5>{{ $product->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                ${{ $product->price }}
                                                @if ($product->discount != null)
                                                    <span>${{ $product->price - ($product->price * $product->discount) / 100 }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- product shop section end -->


@endsection
