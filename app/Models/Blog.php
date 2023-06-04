<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    Protected $guarded  = ['id'];

    function rel_to_blog_cat (){
        return $this->belongsTo(Blog_Category::class, 'blog_category_id','id');
    }


}
