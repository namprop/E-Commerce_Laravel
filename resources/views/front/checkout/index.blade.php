@extends('front.layout.master')
@section('title', 'CheckOut')

@section('body')

    <!-- breacrumb section begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop.html">Shop</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breacrumb section end -->

    <!-- shopping cart section begin -->
    <div class="checkout-section spad">
        <div class="container">
            <form action="{{ route('addOrder') }}" method="POST" class="checkout-form">
                @csrf
                <div class="row">

                 @if($cart->getTotalQuantity() > 0)

                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="login.html" class="content-btn">Click Here To Login</a>
                            <h4>Billing Details</h4>
                            <div class="row">

                                <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id ?? ''}}">

                                <div class="col-lg-6">
                                    <label for="fir">First Name <span>*</span></label>
                                    <input type="text" id="fir" name="first_name" value="{{Auth::user()->name ?? ''}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="last">Last Name <span>*</span></label>
                                    <input type="text" id="last" name="last_name" >
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun-name">Company Name</label>
                                    <input type="text" id="cun-name" name="company_name" value="{{Auth::user()->company_name ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="cun">Country <span>*</span></label>
                                    <input type="text" id="cun" name="country" value="{{Auth::user()->country ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="street">Street Address <span>*</span></label>
                                    <input type="text" id="street" class="street-first" name="street_address" value="{{Auth::user()->street_address ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="zip">Postcode / ZIP (optional) <span>*</span> </label>
                                    <input type="text" id="zip" name="postcode_zip" value="{{Auth::user()->postcode_zip ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="town">Town / City<span>*</span></label>
                                    <input type="text" id="town" name="town_city" value="{{Auth::user()->town_city ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <label for="email">Email Address<span>*</span></label>
                                    <input type="text" id="email" name="email"  value="{{Auth::user()->email ?? ''}}">
                                </div>
                                <div class="col-lg-6">
                                    <label for="phone">Phone<span>*</span></label>
                                    <input type="text" id="phone" name="phone" value="{{Auth::user()->phone ?? ''}}">
                                </div>
                                <div class="col-lg-12">
                                    <div class="create-item">
                                        <label for="acc-create">
                                            Create an account?
                                            <input type="checkbox" id="acc-create">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>

                                    @foreach ($carts as $key => $value)
                                        <li class="fw-normal">{{ $value['name'] }} x {{ $value['qty'] }}
                                            <span>${{ $value['price'] }}</span></li>
                                    @endforeach

                                    <li class="fw-normal">Subtotal <span>${{ $total }}</span></li>
                                    <li class="total-price">Total <span>${{ $subtotal }}</span></li>
                                </ul>

                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Pay later
                                            <input type="radio" name="payment_type" value="pay_later" id="pc-check" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Online payment
                                            <input type="radio" name="payment_type" value="online_payment" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="order-btn">
                                    @if(Auth::check())
                                        <button type="submit" class="site-btn place-btn">Place Order</button>
                                    @else
                                        <p class="">You need to <a href="{{ route('login') }}">Login  Acconunt</a> to place an order.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @else

                    <div class="col-lg-12">
                        <h4>Your cart is empty.</h4>
                    </div>

                    @endif

                </div>
            </form>
        </div>
    </div>
    <!-- shopping cart section end -->

   

@endsection
