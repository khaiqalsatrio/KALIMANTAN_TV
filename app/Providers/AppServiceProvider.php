<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\Category;
use App\Models\Page;
use App\Models\LiveChannel;
use App\Models\Post;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // AMBIL SEMUA DATA GLOBAL
        $top_ad_data = TopAdvertisement::where('id', 1)->first();

        $sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Top')->get();
        $sidebar_middle_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Middle')->get();
        $sidebar_bottom_ad = SidebarAdvertisement::where('sidebar_ad_location', 'Bottom')->get();

        // 🔥 FIX: HAPUS rSubCategory
        $category_data = Category::where('show_on_menu', 'Show')
            ->orderBy('category_order', 'asc')
            ->get();

        $page_data = Page::where('id', 1)->first();
        $live_channel_data = LiveChannel::orderBy('id', 'desc')
            ->take(2)
            ->get();

        // 🔥 FIX: HAPUS rSubCategory
        $recent_news_data = Post::orderBy('id', 'desc')
            ->limit(10)
            ->get();

        // 🔥 FIX: HAPUS rSubCategory
        $popular_news_data = Post::orderBy('visitor_count', 'desc')
            ->limit(10)
            ->get();

        // BAGIKAN KE SEMUA VIEW
        view()->share('global_top_ad_data', $top_ad_data);

        view()->share('global_sidebar_top_ad', $sidebar_top_ad);
        view()->share('global_sidebar_middle_ad', $sidebar_middle_ad);
        view()->share('global_sidebar_bottom_ad', $sidebar_bottom_ad);

        view()->share('global_category_data', $category_data);
        view()->share('global_page_data', $page_data);
        view()->share('global_live_channel_data', $live_channel_data);

        view()->share('global_recent_news_data', $recent_news_data);
        view()->share('global_popular_news_data', $popular_news_data);

        view()->composer('*', function ($view) {
            $view->with('global_tags', Tag::orderBy('tag_name')->get());
        });

        view()->composer('*', function ($view) {
            $view->with('global_category_data', Category::with(['posts' => function ($q) {
                $q->orderBy('id', 'desc')->limit(5); // ambil 5 post terbaru untuk dropdown
            }])->get());
        });

        view()->composer('front.layout.sidebar', function ($view) {
            $tags = Tag::orderBy('id', 'desc')->take(10)->get();
            $view->with('tags', $tags);
        });
    }
}
