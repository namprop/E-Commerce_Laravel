@extends('front.layout.master')
@section('title', 'Cart')

@section('body')
    <!-- breacrumb section begin -->
    <!-- breacrumb section begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <a href="/shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breacrumb section end -->


    <!-- shopping cart section begin -->

    <div class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->list() as $key =>$value)
                                 
                                <<tr>
                                    <td class="cart-pic first-row"><img src="{{ asset('front/img/products/' . $value['associatedModel']['images']) }}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$value['name']}}</h5>
                                    </td>
                                    <td class="p-price first-row">${{$value['price']}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{ $value['qty'] }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">${{ $value['price'] * $value['qty'] }}</td>
                                    <td class="close-td first-row">
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
                    <div class="row">
                        <div class="col-lg-4">
                          <div class="cart-buttons">
                            <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                            <a href="#" class="primary-btn up-cart">Update cart</a>
                          </div>
                          <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            <form action="#" class="coupon-form">
                              <input type="text" placeholder="Enter your codes">
                              <button type="submit" class="site-btn coupon-btn">Apply</button>
                            </form>
                          </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span></span></li>
                                    <li class="cart-total">Total <span>${{number_format($cart->getTotalPrice())}}</span></li>
                                </ul>
                                <a href="./checkout" class="proceed-btn">PROCEED TO CHECK OUT</a>
                              </div>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>

    <!-- shopping cart section end -->


                    @endsection