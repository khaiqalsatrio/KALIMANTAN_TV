<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_slug', 'show_on_menu'];

    // public function posts()
    // {
    //     return $this->hasMany(Post::class, 'category_id');

    //     return $this->hasMany(Post::class);
    // }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id')->orderBy('id', 'DESC');
    }
}
