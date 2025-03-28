<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Service\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use App\Helper\Cart;
use Illuminate\Support\Facades\View;





class CartController extends Controller
{


    //
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index(Cart $cart)
    {
        return view("front.shop.cart", compact('cart'));
    }

    public function add(Request $request, $id, Cart $cart)
    {
        $product = $this->productService->find($id);
        // Lấy số lượng từ request, nếu không có thì mặc định là 1
        $quantity = $request->input('qty', 1);
        if (!is_numeric($quantity) || $quantity <= 0) {
            return redirect()->route('cart.index')->with('error', 'Số lượng không hợp lệ!');
        }
        $cart->add($product, (int)$quantity);
        return back();

    }

    public function remove($id, Cart $cart)
    {
        $cart->remove($id);
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
    public function clear(Cart $cart)
    {
        $cart->clear();
        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được làm trống!');
    }
}
