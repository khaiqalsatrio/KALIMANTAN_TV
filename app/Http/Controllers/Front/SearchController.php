<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    // public function index(Request $request)
    // {
    //     $keyword = $request->get('q');
    //     $category = $request->get('category');
    //     $query = Post::query();
    //     if (!empty($keyword)) {
    //         $query->where(function ($q) use ($keyword) {
    //             $q->where('post_title', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('post_detail', 'LIKE', '%' . $keyword . '%');
    //         });
    //     }
    //     if (!empty($category)) {
    //         $query->where('category_id', $category);
    //     }
    //     // Jika tidak ada filter → tampilkan semua post
    //     if (empty($keyword) && empty($category)) {
    //         $post_data = Post::orderBy('id', 'desc')->get();
    //     } else {
    //         $post_data = $query->orderBy('id', 'desc')->get();
    //     }
    //     return view('front.search', [
    //         'posts' => $post_data,
    //         'keyword' => $keyword,
    //         'category' => $category
    //     ]);
    // }

    public function index(Request $request)
    {
        $keyword = $request->get('q');
        $category = $request->get('category');
        $posts = Post::query()
            ->when($keyword, function ($q) use ($keyword) {
                $q->where(function ($w) use ($keyword) {
                    $w->where('post_title', 'LIKE', "%$keyword%")
                        ->orWhere('post_detail', 'LIKE', "%$keyword%");
                });
            })
            ->when($category, function ($q) use ($category) {
                $q->where('category_id', $category);
            })
            ->orderBy('id', 'desc')
            ->get();
        return view('front.search', compact('posts', 'keyword', 'category'));
    }
}
