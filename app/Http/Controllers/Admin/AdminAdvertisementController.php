<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;

class AdminAdvertisementController extends Controller
{
    public function home_ad_show()
    {
        $home_ad_data = HomeAdvertisement::where('id', 1)->first();
        return view('admin.advertisement_home_view', compact('home_ad_data'));
    }

    public function home_ad_update(Request $request)
    {
        // VALIDASI
        $request->validate([
            'above_search_ad' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);

        // AMBIL DATA ATAU BUAT
        $home_ad_data = HomeAdvertisement::find(1);

        if (!$home_ad_data) {
            $home_ad_data = new HomeAdvertisement();
            $home_ad_data->id = 1;
        }

        // UPLOAD ABOVE SEARCH AD
        if ($request->hasFile('above_search_ad')) {

            if ($home_ad_data->above_search_ad && file_exists(public_path('uploads/' . $home_ad_data->above_search_ad))) {
                unlink(public_path('uploads/' . $home_ad_data->above_search_ad));
            }

            $ext = $request->file('above_search_ad')->extension();
            $final_name = 'above_search_ad_' . time() . '.' . $ext;

            $request->file('above_search_ad')->move(public_path('uploads/'), $final_name);
            $home_ad_data->above_search_ad = $final_name;
        }

        // UPDATE FIELD LAIN (HANYA SEARCH)
        $home_ad_data->above_search_ad_url = $request->above_search_ad_url;
        $home_ad_data->above_search_ad_status = $request->above_search_ad_status;

        $home_ad_data->save();

        return redirect()->back()->with('success', 'Informasi Anda telah berhasil diubah.');
    }


    // public function home_ad_update(Request $request)
    // {
    //     // VALIDASI
    //     $request->validate([
    //         'above_search_ad' => 'nullable|image|mimes:jpg,jpeg,png,gif',
    //         'above_footer_ad' => 'nullable|image|mimes:jpg,jpeg,png,gif'
    //     ]);

    //     // AMBIL DATA ATAU BUAT
    //     $home_ad_data = HomeAdvertisement::find(1);

    //     if (!$home_ad_data) {
    //         $home_ad_data = new HomeAdvertisement();
    //         $home_ad_data->id = 1;
    //     }

    //     // UPLOAD ABOVE SEARCH AD
    //     if ($request->hasFile('above_search_ad')) {

    //         if ($home_ad_data->above_search_ad && file_exists(public_path('uploads/' . $home_ad_data->above_search_ad))) {
    //             unlink(public_path('uploads/' . $home_ad_data->above_search_ad));
    //         }

    //         $ext = $request->file('above_search_ad')->extension();
    //         $final_name = 'above_search_ad_' . time() . '.' . $ext;

    //         $request->file('above_search_ad')->move(public_path('uploads/'), $final_name);
    //         $home_ad_data->above_search_ad = $final_name;
    //     }

    //     // UPLOAD ABOVE FOOTER AD
    //     if ($request->hasFile('above_footer_ad')) {

    //         if ($home_ad_data->above_footer_ad && file_exists(public_path('uploads/' . $home_ad_data->above_footer_ad))) {
    //             unlink(public_path('uploads/' . $home_ad_data->above_footer_ad));
    //         }

    //         $ext = $request->file('above_footer_ad')->extension();
    //         $final_name = 'above_footer_ad_' . time() . '.' . $ext;

    //         $request->file('above_footer_ad')->move(public_path('uploads/'), $final_name);
    //         $home_ad_data->above_footer_ad = $final_name;
    //     }

    //     // UPDATE FIELD LAIN
    //     $home_ad_data->above_search_ad_url = $request->above_search_ad_url;
    //     $home_ad_data->above_search_ad_status = $request->above_search_ad_status;
    //     $home_ad_data->above_footer_ad_url = $request->above_footer_ad_url;
    //     $home_ad_data->above_footer_ad_status = $request->above_footer_ad_status;

    //     $home_ad_data->save();

    //     return redirect()->back()->with('success', 'Informasi Anda telah berhasil diubah.');
    // }



    // public function top_ad_show()
    // {
    //     $top_ad_data = TopAdvertisement::where('id', 1)->first();

    //     return view('admin.advertisement_top_view', compact('top_ad_data'));
    // }

    // public function top_ad_update(Request $request)
    // {
    //     $top_ad_data = TopAdvertisement::where('id', 1)->first();
    //     if ($request->hasFile('top_ad')) {
    //         $request->validate([
    //             'top_ad' => 'image|mimes:jpg,jpeg,png,gif'
    //         ]);
    //         // HAPUS FILE LAMA (jika ada)
    //         if ($top_ad_data->top_ad_image && file_exists(public_path('uploads/' . $top_ad_data->top_ad_image))) {
    //             unlink(public_path('uploads/' . $top_ad_data->top_ad_image));
    //         }
    //         $ext = $request->file('top_ad')->extension();
    //         $final_name = 'top_ad_' . time() . '.' . $ext;
    //         $request->file('top_ad')->move(public_path('uploads/'), $final_name);
    //         // SIMPAN KE KOLOM YANG BENAR
    //         $top_ad_data->top_ad_image = $final_name;
    //     }
    //     // UPDATE KOLOM LAIN
    //     $top_ad_data->top_ad_url = $request->top_ad_url;
    //     $top_ad_data->top_ad_status = $request->top_ad_status;
    //     $top_ad_data->update();
    //     return redirect()->back()->with('success', 'Berhasil diperbarui!');
    // }


    // public function sidebar_ad_show()
    // {
    //     $sidebar_ad_data = SidebarAdvertisement::get();
    //     return view('admin.advertisement_sidebar_view', compact('sidebar_ad_data'));
    // }

    // public function sidebar_ad_create()
    // {
    //     return view('admin.advertisement_sidebar_create');
    // }

    // public function sidebar_ad_store(Request $request)
    // {
    //     $request->validate([
    //         'sidebar_ad' => 'required|image|mimes:png,jpg,jpeg,gif'
    //     ], [
    //         'sidebar_ad.required' => 'Select a photo for ads',
    //         'sidebar_ad.image' => 'Photo must be an image',
    //         'sidebar_ad.mimes' => 'Correct mimes needed'
    //     ]);
    //     $now = time();
    //     $ext = $request->file('sidebar_ad')->extension();
    //     $final_name = 'sidebar_ad_' . $now . '.' . $ext;
    //     $request->file('sidebar_ad')->move(public_path('uploads/'), $final_name);
    //     $sidebar_ad_data = new SidebarAdvertisement();
    //     $sidebar_ad_data->sidebar_ad = $final_name;
    //     $sidebar_ad_data->sidebar_ad_url = $request->sidebar_ad_url;
    //     $sidebar_ad_data->sidebar_ad_location = $request->sidebar_ad_location;
    //     $sidebar_ad_data->save();
    //     return redirect()->route('admin_sidebar_ad_show')->with('success', 'Iklan Anda telah berhasil ditambahkan.');
    // }

    // public function sidebar_ad_edit($id)
    // {
    //     $sidebar_ad_data = SidebarAdvertisement::where('id', $id)->first();
    //     return view('admin.advertisement_sidebar_edit', compact('sidebar_ad_data'));
    // }

    // public function sidebar_ad_update(Request $request, $id)
    // {
    //     $sidebar_ad_data = SidebarAdvertisement::where('id', $id)->first();
    //     if ($request->hasFile('sidebar_ad')) {
    //         $request->validate([
    //             'sidebar_ad' => 'required|image|mimes:png,jpg,jpeg,gif'
    //         ], [
    //             'sidebar_ad.required' => 'Select a photo for ads',
    //             'sidebar_ad.image' => 'Photo must be an image',
    //             'sidebar_ad.mimes' => 'Correct mimes needed'
    //         ]);
    //         unlink(public_path('uploads/' . $sidebar_ad_data->sidebar_ad));
    //         $now = time();
    //         $ext = $request->file('sidebar_ad')->extension();
    //         $final_name = 'sidebar_ad_' . $now . '.' . $ext;
    //         $request->file('sidebar_ad')->move(public_path('uploads/'), $final_name);
    //         $sidebar_ad_data->sidebar_ad = $final_name;
    //     }
    //     $sidebar_ad_data->sidebar_ad_url = $request->sidebar_ad_url;
    //     $sidebar_ad_data->sidebar_ad_location = $request->sidebar_ad_location;
    //     $sidebar_ad_data->update();
    //     return redirect()->route('admin_sidebar_ad_show')->with('success', 'Informasi Anda telah berhasil diubah.');
    // }

    // public function sidebar_ad_delete($id)
    // {
    //     $sidebar_ad_data = SidebarAdvertisement::where('id', $id)->first();
    //     unlink(public_path('uploads/' . $sidebar_ad_data->sidebar_ad));
    //     $sidebar_ad_data->delete();
    //     return redirect()->route('admin_sidebar_ad_show')->with('success', 'Informasi Anda telah berhasil dihapus.');
    // }
}
