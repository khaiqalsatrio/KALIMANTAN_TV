<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\Category;
use App\Models\Page;
use App\Models\LiveChannel;
use App\Models\Post;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrap();

        // Cek koneksi DB aman
        if (!Schema::hasTable('migrations')) {
            return; // DB belum siap → hentikan semua agar tidak error
        }

        // ===== GLOBAL DATA AMAN =====
        $top_ad_data = Schema::hasTable('top_advertisements')
            ? TopAdvertisement::find(1)
            : null;

        $sidebar_top_ad = Schema::hasTable('sidebar_advertisements')
            ? SidebarAdvertisement::where('sidebar_ad_location', 'Top')->get()
            : collect();

        $sidebar_middle_ad = Schema::hasTable('sidebar_advertisements')
            ? SidebarAdvertisement::where('sidebar_ad_location', 'Middle')->get()
            : collect();

        $sidebar_bottom_ad = Schema::hasTable('sidebar_advertisements')
            ? SidebarAdvertisement::where('sidebar_ad_location', 'Bottom')->get()
            : collect();

        $category_data = Schema::hasTable('categories')
            ? Category::where('show_on_menu', 'Show')->orderBy('category_order')->get()
            : collect();

        $page_data = Schema::hasTable('pages')
            ? Page::find(1)
            : null;

        $live_channel_data = Schema::hasTable('live_channels')
            ? LiveChannel::orderBy('id', 'desc')->take(2)->get()
            : collect();

        $recent_news_data = Schema::hasTable('posts')
            ? Post::orderBy('id', 'desc')->limit(10)->get()
            : collect();

        $popular_news_data = Schema::hasTable('posts')
            ? Post::orderBy('visitor_count', 'desc')->limit(10)->get()
            : collect();

        // SHARE DATA
        view()->share([
            'global_top_ad_data' => $top_ad_data,
            'global_sidebar_top_ad' => $sidebar_top_ad,
            'global_sidebar_middle_ad' => $sidebar_middle_ad,
            'global_sidebar_bottom_ad' => $sidebar_bottom_ad,
            'global_category_data' => $category_data,
            'global_page_data' => $page_data,
            'global_live_channel_data' => $live_channel_data,
            'global_recent_news_data' => $recent_news_data,
            'global_popular_news_data' => $popular_news_data,
        ]);

        // ===== VIEW COMPOSERS =====
        view()->composer('*', function ($view) {
            if (Schema::hasTable('tags')) {
                $view->with('global_tags', Tag::orderBy('tag_name')->get());
            }
        });

        view()->composer('*', function ($view) {
            if (Schema::hasTable('categories')) {
                $view->with('menu_categories', Category::with(['posts' => function ($q) {
                    $q->orderBy('id', 'desc')->limit(5);
                }])->get());
            }
        });

        view()->composer('front.layout.sidebar', function ($view) {
            if (Schema::hasTable('tags')) {
                $view->with('tags', Tag::orderBy('id', 'desc')->take(10)->get());
            }
        });
    }
}
