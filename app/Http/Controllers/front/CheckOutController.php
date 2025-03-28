<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use App\Helper\Cart;

class CheckOutController extends Controller
{

    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        
    }
    public function index( Cart $cart){

        $carts = $cart->list();
        $total = $cart->getTotalPrice();
        $subtotal = $cart->getTotalPrice();
        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request, Cart $cart ){

       $order = $this->orderService->create($request->all());

       $carts = $cart->list();

    foreach ($carts as $item) {
        $data = [
            'order_id' => $order->id,
            'product_id' => $item['id'], 
            'qty' => $item['qty'],
            'amount' => $item['price'],
            'total' => $item['qty'] * $item['price'],
        ];
    
        $this->orderDetailService->create($data);
    }
    $cart->clear();
    
    return redirect('checkout/result')->with('notification', 'Success! You will pay on delivery!');
    
    }


    public function result(){
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }
}
