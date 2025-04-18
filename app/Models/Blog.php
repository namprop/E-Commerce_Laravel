<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
        //
        protected $table = "blogs";
        protected $primaryKey = 'id';
        protected $guarded = [];

        public function blogComments(){
            return $this->hasMany(BlogComment::class,'blog_id','id');
        }
}
