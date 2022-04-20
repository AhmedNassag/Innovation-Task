<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table    = 'posts';
    protected $fillable = ['title_en','title_ar','body'];
}
