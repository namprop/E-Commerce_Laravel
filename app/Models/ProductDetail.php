<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
        //
        protected $table = "product_details";
        protected $primaryKey = 'id';
        protected $guarded = [];

        public function products() {
            return $this->belongsTo(Product::class, 'product_id', 'id');
        }
}
