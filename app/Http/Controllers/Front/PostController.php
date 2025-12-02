<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /** DETAIL POST */
    public function detail($id)
    {
        $post_detail = Post::where('id', $id)->firstOrFail();
        // User Data Aman
        $user_data = null;
        if ($post_detail->author_id == 0) {
            $user_data = Admin::find($post_detail->admin_id);
        }
        // HIT VISITOR
        $post_detail->increment('visitor_count');
        // TAG khusus post ini
        $tag_data = Tag::where('post_id', $id)->limit(20)->get();
        // TAG global untuk sidebar
        $tags = Tag::orderBy('id', 'desc')->limit(25)->get();
        // ARCHIVE global
        $archives = Post::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('DATE_FORMAT(MIN(created_at), "%M %Y") as formatted_date')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        // RELATED POST
        $related_posts = Post::where('category_id', $post_detail->category_id)
            ->where('id', '!=', $post_detail->id)
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
        // Fallback jika related kosong
        if ($related_posts->count() == 0) {
            $related_posts = Post::where('id', '!=', $post_detail->id)
                ->inRandomOrder()
                ->limit(6)
                ->get();
        }
        return view('front.post_detail', compact(
            'post_detail',
            'user_data',
            'tag_data',
            'tags',
            'archives',
            'related_posts'  // ✔ Penting
        ));
    }


    /** LIST POST */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('front.post', compact('posts'));
    }
}
