<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request)
    {

        $admin_data = Admin::where('email', Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $admin_data->name = $request->name;
        $admin_data->email = $request->email;

        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password'
            ]);
            $admin_data->password = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            // Path root dari server (production friendly)
            $rootPath = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/uploads/';

            // Hapus foto lama jika ada
            if ($admin_data->photo) {
                $oldPhoto = $rootPath . $admin_data->photo;

                if (file_exists($oldPhoto)) {
                    unlink($oldPhoto);
                }
            }

            // Upload foto baru
            $ext = $request->file('photo')->extension();
            $final_name = 'admin.' . $ext;

            // Buat folder jika belum ada
            if (!is_dir($rootPath)) {
                mkdir($rootPath, 0755, true);
            }

            // Simpan file
            $request->file('photo')->move($rootPath, $final_name);

            $admin_data->photo = $final_name;
        }

        $admin_data->update();
        return redirect()->back()->with('success', 'Informasi profil Anda telah berhasil diubah.');
    }
}
