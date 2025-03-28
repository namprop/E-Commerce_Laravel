<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    //
        //
        protected $table = "blog_comments";
        protected $primaryKey = 'id';
        protected $guarded = [];

        public function blog(){
            return $this->belongsTo(Blog::class,'blog_id','id');
        }
}
