<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
        //
        protected $table = "brands";
        protected $primaryKey = 'id';
        protected $guarded = [];

        public function products(){
            return $this->hasHany(Product::class,'brand_id','id');
        }
}
