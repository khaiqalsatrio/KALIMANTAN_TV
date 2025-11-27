<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CategoryController extends Controller
{
    // public function index($id)
    // {
    //     // Ambil kategori
    //     $category = Category::findOrFail($id);

    //     // Ambil 3 berita terbaru
    //     $posts = Post::where('category_id', $id)
    //         ->orderBy('id', 'desc')
    //         ->take(3)
    //         ->get();

    //     return view('front.category', compact('category', 'posts'));
    // }


public function category($id)
{
    $category = Category::findOrFail($id);

    $posts = Post::where('category_id', $id)
        ->orderBy('id', 'desc')
        ->paginate(16);

    return view('front.category', compact('category', 'posts'));
}

}
