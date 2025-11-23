<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category_data = Category::where('id', $id)->first();
        $post_data = Post::where('category_id', $id)
            ->orderBy('id', 'desc')
            ->paginate(4);

        // 🔥 Tambahkan ini untuk menghindari error $tags
        $tags = Tag::orderBy('id', 'desc')->get();

        return view('front.category', compact(
            'category_data',
            'post_data',
            'tags'
        ));
    }
}
