<?php
namespace App\Helper;
class Cart{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }

    public function list(){
        return $this->items;
    }

    public function add($product, $quantity = 1)
    {

         $item = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $quantity,
            'price' => $product->discount ?? $product->price,
            'weight' => $product->weight ?? 0,
            'options' => [],
            'associatedModel' => [
                'images' => $product->productImages[0]->path
            ]
        ];

        $this->items[$product->id] = $item;

        session(['cart' => $this->items]);

        
    }

    public function remove($productId){
        if(isset($this->items[$productId])){
            unset($this->items[$productId]);
            session(['cart' => $this->items]);
            $this->total_quantity = $this->getTotalQuantity();
            $this->total_price = $this->getTotalPrice();
        }
    }

    public function clear(){
        $this->items = [];
        session(['cart' => $this->items]);
        $this->total_quantity = 0;
        $this->total_price = 0;
    }

    public function getTotalPrice(){
        $totalPrice = 0;
        foreach($this->items as $item){
            $totalPrice += $item['price'] * $item['qty'];
        }

        return $totalPrice;
    }

    public function getTotalQuantity(){
        $totalQuantity = 0;
        foreach($this->items as $item){
            $totalQuantity += $item['qty'];
        }

        return $totalQuantity;
    }


}