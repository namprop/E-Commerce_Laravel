<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    //
        //
        protected $table = "product_comments";
        protected $primaryKey = 'id';
        protected $guarded = [];

        public function products() {
            return $this->belongsTo(Product::class, 'product_id', 'id');
        }
        
        public function user() {
            return $this->belongsTo(User::class, 'User_id', 'id');
        }
}
