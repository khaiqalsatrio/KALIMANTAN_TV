<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\DisclaimerController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\SubCategoryController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\SubscriberController;

/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminLiveChannelController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
use App\Http\Controllers\Front\CategoryController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// Halaman umum
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/privacy-policy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/disclaimer', [DisclaimerController::class, 'index'])->name('disclaimer');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email', [ContactController::class, 'send_email'])->name('contact_form_submit');

// Post Berita
Route::get('/post', [PostController::class, 'index'])->name('post_list');
Route::get('/post/{id}', [PostController::class, 'detail'])->name('post_detail');
Route::get('/news-detail/{id}', [PostController::class, 'detail'])->name('news_detail');

// Category
Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category');

// Gallery
Route::get('/photo-gallery', [PhotoController::class, 'index'])->name('photo_gallery');
Route::get('/video-gallery', [VideoController::class, 'index'])->name('video_gallery');

// Subscriber
Route::post('/subscriber', [SubscriberController::class, 'index'])->name('subscribe');
Route::get('/subscriber/verify/{token}/{email}', [SubscriberController::class, 'verify'])->name('subscriber_verify');



/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// Auth
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');

Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');

Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');


// Semua route admin harus pakai middleware admin
Route::middleware('admin:admin')->group(function () {

    // Dashboard
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');

    // Profile
    Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

    /*
    |--------------------------------------------------------------------------
    | Advertisement
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/home-advertisement', [AdminAdvertisementController::class, 'home_ad_show'])->name('admin_home_ad_show');
    Route::post('/admin/home-advertisement-update', [AdminAdvertisementController::class, 'home_ad_update'])->name('admin_home_ad_update');

    Route::get('/admin/top-advertisement', [AdminAdvertisementController::class, 'top_ad_show'])->name('admin_top_ad_show');
    Route::post('/admin/top-advertisement-update', [AdminAdvertisementController::class, 'top_ad_update'])->name('admin_top_ad_update');

    Route::get('/admin/sidebar-advertisement', [AdminAdvertisementController::class, 'sidebar_ad_show'])->name('admin_sidebar_ad_show');
    Route::get('/admin/sidebar-advertisement-create', [AdminAdvertisementController::class, 'sidebar_ad_create'])->name('admin_sidebar_ad_create');
    Route::post('/admin/sidebar-advertisement-store', [AdminAdvertisementController::class, 'sidebar_ad_store'])->name('admin_sidebar_ad_store');
    Route::get('/admin/sidebar-advertisement-edit/{id}', [AdminAdvertisementController::class, 'sidebar_ad_edit'])->name('admin_sidebar_ad_edit');
    Route::post('/admin/sidebar-advertisement-update/{id}', [AdminAdvertisementController::class, 'sidebar_ad_update'])->name('admin_sidebar_ad_update');
    Route::get('/admin/sidebar-advertisement-delete/{id}', [AdminAdvertisementController::class, 'sidebar_ad_delete'])->name('admin_sidebar_ad_delete');


    /*
    |--------------------------------------------------------------------------
    | Category & SubCategory
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/category')->group(function () {
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin_category_create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin_category_store');
        Route::get('/show', [AdminCategoryController::class, 'show'])->name('admin_category_show');
        Route::get('/edit/{id}', [AdminCategoryController::class, 'edit'])->name('admin_category_edit');
        Route::post('/update/{id}', [AdminCategoryController::class, 'update'])->name('admin_category_update');
        Route::get('/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin_category_delete');
    });

    Route::prefix('admin/sub-category')->group(function () {
        Route::get('/show', [AdminSubCategoryController::class, 'show'])->name('admin_sub_category_show');
        Route::get('/create', [AdminSubCategoryController::class, 'create'])->name('admin_sub_category_create');
        Route::post('/store', [AdminSubCategoryController::class, 'store'])->name('admin_sub_category_store');
        Route::get('/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin_sub_category_edit');
        Route::post('/update/{id}', [AdminSubCategoryController::class, 'update'])->name('admin_sub_category_update');
        Route::get('/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete');
    });


    /*
    |--------------------------------------------------------------------------
    | Post, Photo, Video
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/post')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('admin_post_show');
        Route::get('/create', [AdminPostController::class, 'create'])->name('admin_post_create');
        Route::post('/store', [AdminPostController::class, 'store'])->name('admin_post_store');
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
        Route::post('/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
        Route::get('/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');
    });

    Route::prefix('admin/photo')->group(function () {
        Route::get('/create', [AdminPhotoController::class, 'create'])->name('admin_photo_create');
        Route::post('/store', [AdminPhotoController::class, 'store'])->name('admin_photo_store');
        Route::get('/show', [AdminPhotoController::class, 'show'])->name('admin_photo_show');
        Route::get('/edit/{id}', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit');
        Route::post('/update/{id}', [AdminPhotoController::class, 'update'])->name('admin_photo_update');
        Route::get('/delete/{id}', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete');
    });

    Route::prefix('admin/video')->group(function () {
        Route::get('/create', [AdminVideoController::class, 'create'])->name('admin_video_create');
        Route::post('/store', [AdminVideoController::class, 'store'])->name('admin_video_store');
        Route::get('/show', [AdminVideoController::class, 'show'])->name('admin_video_show');
        Route::get('/edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_edit');
        Route::post('/update/{id}', [AdminVideoController::class, 'update'])->name('admin_video_update');
        Route::get('/delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_delete');
    });


    /*
    |--------------------------------------------------------------------------
    | Pages
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/page')->group(function () {
        Route::get('/about/edit', [AdminPageController::class, 'about'])->name('admin_page_about');
        Route::post('/about/update', [AdminPageController::class, 'about_update'])->name('admin_page_about_update');

        Route::get('/faq/edit', [AdminPageController::class, 'faq'])->name('admin_page_faq');
        Route::post('/faq/update', [AdminPageController::class, 'faq_update'])->name('admin_page_faq_update');

        Route::get('/terms/edit', [AdminPageController::class, 'terms'])->name('admin_page_terms');
        Route::post('/terms/update', [AdminPageController::class, 'terms_update'])->name('admin_page_terms_update');

        Route::get('/privacy/edit', [AdminPageController::class, 'privacy'])->name('admin_page_privacy');
        Route::post('/privacy/update', [AdminPageController::class, 'privacy_update'])->name('admin_page_privacy_update');

        Route::get('/disclaimer/edit', [AdminPageController::class, 'disclaimer'])->name('admin_page_disclaimer');
        Route::post('/disclaimer/update', [AdminPageController::class, 'disclaimer_update'])->name('admin_page_disclaimer_update');

        Route::get('/login/edit', [AdminPageController::class, 'login'])->name('admin_page_login');
        Route::post('/login/update', [AdminPageController::class, 'login_update'])->name('admin_page_login_update');

        Route::get('/contact/edit', [AdminPageController::class, 'contact'])->name('admin_page_contact');
        Route::post('/contact/update', [AdminPageController::class, 'contact_update'])->name('admin_page_contact_update');
    });


    /*
    |--------------------------------------------------------------------------
    | FAQ + SUBSCRIBER + LIVE CHANNEL + POLL
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin/faq')->group(function () {
        Route::get('/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
        Route::post('/store', [AdminFaqController::class, 'store'])->name('admin_faq_store');
        Route::get('/show', [AdminFaqController::class, 'show'])->name('admin_faq_show');
        Route::get('/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
        Route::post('/update/{id}', [AdminFaqController::class, 'update'])->name('admin_faq_update');
        Route::get('/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');
    });

    Route::prefix('admin/subscriber')->group(function () {
        Route::get('/all', [AdminSubscriberController::class, 'show_all'])->name('admin_subscribers');
        Route::get('/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscribers_send_email');
        Route::post('/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscribers_send_email_submit');
    });

    Route::prefix('admin/live_channel')->group(function () {
        Route::get('/create', [AdminLiveChannelController::class, 'create'])->name('admin_live_channel_create');
        Route::post('/store', [AdminLiveChannelController::class, 'store'])->name('admin_live_channel_store');
        Route::get('/show', [AdminLiveChannelController::class, 'show'])->name('admin_live_channel_show');
        Route::get('/edit/{id}', [AdminLiveChannelController::class, 'edit'])->name('admin_live_channel_edit');
        Route::post('/update/{id}', [AdminLiveChannelController::class, 'update'])->name('admin_live_channel_update');
        Route::get('/delete/{id}', [AdminLiveChannelController::class, 'delete'])->name('admin_live_channel_delete');
    });

    Route::prefix('admin/online_poll')->group(function () {
        Route::get('/create', [AdminOnlinePollController::class, 'create'])->name('admin_online_poll_create');
        Route::post('/store', [AdminOnlinePollController::class, 'store'])->name('admin_online_poll_store');
        Route::get('/show', [AdminOnlinePollController::class, 'show'])->name('admin_online_poll_show');
        Route::get('/edit/{id}', [AdminOnlinePollController::class, 'edit'])->name('admin_online_poll_edit');
        Route::post('/update/{id}', [AdminOnlinePollController::class, 'update'])->name('admin_online_poll_update');
        Route::get('/delete/{id}', [AdminOnlinePollController::class, 'delete'])->name('admin_online_poll_delete');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN SETTING
    |--------------------------------------------------------------------------
    */
    Route::middleware('admin:admin')->group(function () {
        Route::get('/admin/setting', [AdminSettingController::class, 'index'])
            ->name('admin_setting');
        Route::post('/admin/setting/update', [AdminSettingController::class, 'update'])
            ->name('admin_setting_update');
    });
});
