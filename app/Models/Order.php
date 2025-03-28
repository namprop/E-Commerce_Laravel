<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
        //
        protected $table = "orders";
        protected $primaryKey = 'id';
        protected $guarded = [];

        public function orderDetails(){
            return $this->hasMany(OrderDetail::class,'order_id','id');
        }
}
