<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Tag;

class PostController extends Controller
{
    /** DETAIL POST */
    public function detail($id)
    {
        // 🔥 FIX: Hapus with('rSubCategory')
        $post_detail = Post::where('id', $id)->firstOrFail();
        // User Data Aman
        $user_data = null;
        if ($post_detail->author_id == 0) {
            $user_data = Admin::find($post_detail->admin_id);
        }
        // HIT VISITOR
        $post_detail->increment('visitor_count');
        $tag_data = Tag::where('post_id', $id)->get();
        return view('front.post_detail', compact(
            'post_detail',
            'user_data',
            'tag_data'
        ));
    }

    /** LIST POST */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('front.post', compact('posts'));
    }
}
