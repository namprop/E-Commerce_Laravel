<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{ asset('/') }}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
    <!-- Start coding here -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- header-section-begin -->

    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope">
                            tiennam235@gmail.com
                        </i>
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone">
                            0123456789
                        </i>
                    </div>
                </div>
                <div class="ht-right">

                    @if (Auth::check())
                        <a href="./account" class="login-panel">
                            <i class="fa fa-user"></i>
                            {{ Auth::user()->name }} - Logout</a>
                    @else
                        <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    @endif


                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="front/img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">
                                English</option>
                            <option value='yu' data-image="front/img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German</option>
                        </select>
                    </div>

                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>


        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="">
                                <img src="" height="25" alt="">
                                <h2>Logo</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">

                        <form action="shop">
                            <div class="advanced-search">
                                <button type="button" class="category-btn">All Categories</button>
                                <div class="input-group">
                                    <input name="search" value="{{ request('search') }}" type="text"
                                        placeholder="What do you need?">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>


                        </form>

                    </div>

                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="{{ route('cart.index') }}">
                                    <i class="icon_bag_alt"></i>

                                    <span>
                                        @if (isset($cart))
                                            {{ $cart->getTotalQuantity() }}
                                        @else
                                        <span>0</span>
                                        @endif
                                    </span>
                                </a>

                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                @foreach ($cart->list() as $key=> $value)
                                                    <tr>                           
                                                        <td class="si-pic"><img src="{{ asset('front/img/products/' . $value['associatedModel']['images']) }}">
                                                        </td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>${{$value['price']}} x {{$value['qty']}} </p>
                                                                <h6>{{$value['name']}}</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <form action="{{ route('cart.remove', $key) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                <button type="submit" style="border: none; background: none;">
                                                                    <i class="ti-close"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total</span>
                                        <h5>${{ isset($cart) ? $cart->getTotalPrice() : '0.00' }}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="./checkout" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>

                                </div>
                            </li>   
                            <li class="cart-price">
                                @if (isset($cart))
                                    ${{ $cart->getTotalPrice() }}
                                @else
                                    $0.00
                                @endif
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women's Clothing</a></li>
                            <li><a href="#">Men's Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand codeleanon</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ request()->segment(1) == '' ? 'active' : '' }}"><a href="./">Home</a>
                        </li>
                        <li class="{{ request()->segment(1) == 'shop' ? 'active' : '' }}"><a href="./shop">Shop</a>
                        </li>
                        <li><a href="">Collection</a>
                            <ul class="dropdown">
                                <li><a href="">Men's</a></li>
                                <li><a href="">Women's</a></li>
                                <li><a href="">Kid's</a></li>
                            </ul>
                        </li>
                        <li><a href="/">Blog</a></li>
                        <li><a href="/">Contact</a></li>
                        <li><a href="">Pages</a>
                            <ul class="dropdown">
                                <li><a href="blog-details">Blog Details</a></li>
                                <li><a href="./cart">Shopping Cart</a></li>
                                <li><a href="./checkout">Checkout</a></li>
                                <li><a href="/">Faq</a></li>
                                <li><a href="./account/register">Register</a></li>
                                <li><a href="./account/login">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- header-section-end -->



    {{-- Body here --}}
    @yield('body')





    <!-- footter section begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="/">
                                <img src="" height="25" alt="">Logo
                            </a>
                        </div>
                        <ul>
                            <li>1</li>
                            <li>Phone: </li>
                            <li>Email: </li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fat fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Serivius</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="">My Account</a></li>
                            <li><a href="">Contact</a></li>
                            <li><a href="">Shopping Cart</a></li>
                            <li><a href="">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights res
                        </div>
                        <div class="payment-pic">
                            <img src="front/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footter section end -->



    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/js/owlcarousel2-filter.min.js"></script>
    <script src="front/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.querySelector(".checkout-form");
            const placeOrderBtn = document.querySelector(".place-btn");
    
            placeOrderBtn.addEventListener("click", function (event) {
                let isValid = true;
                const requiredFields = ["first_name", "last_name", "country", "street_address", "town_city", "email", "phone"];
    
                requiredFields.forEach(field => {
                    const input = document.querySelector(`[name="${field}"]`);
                    if (!input || input.value.trim() === "") {
                        isValid = false;
                        input.style.border = "1px solid red"; // Đánh dấu lỗi
                    } else {
                        input.style.border = ""; // Reset nếu hợp lệ
                    }
                });
    
                if (!isValid) {
                    event.preventDefault();
                    alert("Please fill in all required fields before placing your order.");
                }
            });
        });
        </script>
</body>

</html>
