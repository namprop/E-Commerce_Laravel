<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
        //
        protected $table = "product_categories";
        protected $primaryKey = 'id';
        protected $guarded = [];

        public function products() {
            return $this->hasMany(Product::class, 'product_category_id', 'id');
        }
        
      
}
