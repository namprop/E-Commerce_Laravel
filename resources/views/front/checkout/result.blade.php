@extends('front.layout.master')
@section('title', 'Result')

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
                    <div class="col-lg-12">
                        <h4>{{$notification}}</h4>
                        <a href="./" class="primary-btn mt-5">Contine shopping</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- shopping cart section end -->












@endsection
