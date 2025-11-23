<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Category;
use App\Models\Video;
use App\Models\SidebarAdvertisement;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // public function index()
    // {
    //     $home_ad_data = HomeAdvertisement::where('id', 1)->first();
    //     $setting_data = Setting::where('id', 1)->first();

    //     // AMBIL CATEGORY + POSTS (tanpa subcategory)
    //     $categories = Category::with(['posts' => function ($q) {
    //         $q->orderBy('id', 'desc');
    //     }])
    //         ->where('show_on_menu', 'Show')
    //         ->orderBy('id', 'asc')
    //         ->get();

    //     $video_data = Video::orderBy('id', 'desc')->get();
    //     $global_sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Top')->get();

    //     return view('front.home', compact(
    //         'home_ad_data',
    //         'setting_data',
    //         'categories',     // ← WAJIB
    //         'video_data',
    //         'global_sidebar_top_ad'
    //     ));
    // }

    public function index()
    {
        $home_ad_data = HomeAdvertisement::where('id', 1)->first();
        $setting_data = Setting::where('id', 1)->first();
        // AMBIL CATEGORY + POSTS (tanpa subcategory)
        $categories = Category::with(['posts' => function ($q) {
            $q->orderBy('id', 'desc');
        }])
            ->where('show_on_menu', 'Show')
            ->orderBy('id', 'asc')
            ->get();
        // POST UNTUK NEWS TICKER
        $post_data = Post::orderBy('id', 'desc')->get();
        $video_data = Video::orderBy('id', 'desc')->get();
        $global_sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Top')->get();

        // AMBIL DATA TAG
        $tags = Tag::orderBy('id', 'desc')->limit(25)->get();

        // TAMBAHKAN BAGIAN INI UNTUK ARCHIVE 
        $archives = Post::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('DATE_FORMAT(MIN(created_at), "%M %Y") as formatted_date')
        )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('front.home', compact(
            'home_ad_data',
            'setting_data',
            'categories',
            'video_data',
            'global_sidebar_top_ad',
            'post_data',  // ← WAJIB
            'tags',
            'archives'   // ← KIRIM KE VIEW
        ));
    }

    public function archive($year, $month)
    {
        // Ambil semua posting berdasarkan tahun & bulan
        $posts = Post::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('id', 'desc')
            ->get();

        // Format nama bulan untuk judul
        $monthName = date("F", mktime(0, 0, 0, $month, 1));

        return view('front.archive', compact('posts', 'year', 'month', 'monthName'));
    }
}
