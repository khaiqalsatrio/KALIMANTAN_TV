<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category_data = Category::where('id', $id)->first();
        $post_data = Post::where('category_id', $id)->orderBy('id', 'desc')->paginate(4);

        return view('front.category', compact('category_data', 'post_data'));
    }
}
