<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Category;
use App\Models\Video;
use App\Models\SidebarAdvertisement;

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

        return view('front.home', compact(
            'home_ad_data',
            'setting_data',
            'categories',
            'video_data',
            'global_sidebar_top_ad',
            'post_data'  // ← WAJIB
        ));
    }
}
