<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title','slug','short_description','long_description','page_title','meta_tag','image'];

    protected $table = 'blogs';

}
