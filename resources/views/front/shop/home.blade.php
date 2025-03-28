@extends('front.layout.master')

@section('title', 'home')



@section('body')
    <!-- hero section begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="front/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag, kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>

            <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag, kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- hero section end -->


    <!-- baner section begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Men's</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Men's</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="front/img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Men's</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- baner section end -->


    <!-- Women banner section begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/women-large.jpg">
                        <h2>Women's</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="women">All</li>
                            <li class="item" data-tag=".Clothing" data-category="women">Clothings</li>
                            <li class="item" data-tag=".HandBag" data-category="women">HandBag</li>
                            <li class="item" data-tag=".Shoes" data-category="women">Shoes</li>
                            <li class="item" data-tag=".Accessories" data-category="women">Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel women">
                        @foreach ($featuredProducts['women'] as $product)
                            <div class="product-item item{{$product->tag}}">
                                <div class="pi-pic">
                                  
                                        <img src="{{ asset('front/img/products/' . $product->productImages[0]->path ?? '') }}"
                                            alt="">

                                    @if ($product->discount != null)
                                        <div class="sale"> Sale</div>
                                    @endif
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>

                                    <ul>
                                        <li class="w-icon active">
                                            <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                                    <i class="icon_bag_alt"></i>
                                                </button>
                                            </form>
                                        </li>
                                        <li class="quick-view"><a href="shop/product/{{$product->id}}">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Coat</div>
                                    <a href="">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        ${{ $product->price }}
                                        @if ($product->discount != null)
                                            <span>${{ $product->discount }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women banner section end -->


    <!-- Deal of the week begin -->
    <section class="deal-of-week set-bg spad" data-setbg="front/img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit</p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">

                <div class="cd-item">
                    <span>56</span>
                    <p>Day</p>
                </div>
                <div class="cd-item">
                    <span>56</span>
                    <p>Day</p>
                </div>
                <div class="cd-item">
                    <span>56</span>
                    <p>Day</p>
                </div>
                <div class="cd-item">
                    <span>56</span>
                    <p>Day</p>
                </div>
            </div>
            <a href="" class="primary-btn">Shop Now</a>

        </div>
    </section>
    <!-- Deal of the week end -->


    <!-- man banner section begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="front/img/products/man-large.jpg">
                        <h2>Man's</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active item" data-tag="*" data-category="men">All</li>
                            <li class="item" data-tag=".Clothing" data-category="men">Clothings</li>
                            <li class="item" data-tag=".HandBag" data-category="men">HandBag</li>
                            <li class="item" data-tag=".Shoes" data-category="men">Shoes</li>
                            <li class="item" data-tag=".Accessories" data-category="men">Accessories</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel men">
                        @foreach ($featuredProducts['men'] as $product)
                            <div class="product-item item">
                                <div class="pi-pic">
                                    <img 
                                    src="front/img/products/{{ $product->productImages[0]->path ?? '' }}" alt="">
                                    
                                    @if ($product->discount != null)
                                        <div class="sale"> Sale</div>
                                    @endif
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>

                                    <ul>
                                        <li class="w-icon active">
                                            <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                                    <i class="icon_bag_alt"></i>
                                                </button>
                                            </form>
                                        </li>
                                        <li class="quick-view"><a href="product.html">+ Quick View</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name">Coat</div>
                                    <a href="">
                                        <h5>{{ $product->name }}</h5>
                                    </a>
                                    <div class="product-price">
                                        ${{ $product->price }}
                                        @if ($product->discount != null)
                                            <span>${{ $product->discount }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- man banner section end -->


    <!-- instagram section begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">CodeLean_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">CodeLean_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">CodeLean_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">CodeLean_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">CodeLean_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">CodeLean_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- instagram section end -->

    <!-- latest blog section begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($getLatesBlogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="{{ asset('front/img/blog/' . $blog->image) }}" alt="">
                        {{-- <img src="front/img/latest-1.jpg" alt=""> --}}
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    {{ $date = date('d-m-Y', strtotime($blog->created_at)) }}
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    {{ $blog->comments ? count($blog->comments) : 0 }}
                                </div>
                            </div>
                            <a href="">
                                <h5>{{ $blog->title}}</h5>
                            </a>
                            <p>{{$blog->subtile}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
              
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="front/img/icon-3.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog section end -->






@endsection
