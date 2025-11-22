<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class SubscriberController extends Controller
{
    /**
     * Proses submit form subscriber email
     */
    public function index(Request $request)
    {
        // Validasi input email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);


        // Jika validasi gagal → kirim error lewat JSON (Ajax)
        if (!$validator->passes()) {
            return response()->json([
                'code' => 0,
                'error_message' => $validator->errors()->toArray()
            ]);
        }

        // Jika validasi berhasil → proses simpan ke database & kirim email verifikasi

        // Generate token unik menggunakan hash
        $token = hash('sha256', time());

        // Buat subscriber baru
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;    // email dari form
        $subscriber->token = $token;             // token verifikasi
        $subscriber->status = 'Pending';         // status awal
        $subscriber->save();                     // simpan ke DB

        // Judul email
        $subject = 'Subscriber Email Verification';

        // Link verifikasi
        $verification_link = url('subscriber/verify/' . $token . '/' . $request->email);

        // Isi pesan email
        $message  = 'Silakan klik link berikut untuk verifikasi email Anda:<br>';
        $message .= '<a href="' . $verification_link . '">' . $verification_link . '</a>';

        // Kirim email
        Mail::to($request->email)->send(new Websitemail($subject, $message));

        // Kirim respons sukses via JSON untuk ajax
        return response()->json([
            'code' => 1,
            'success_message' => 'Silakan cek email Anda untuk melakukan verifikasi.'
        ]);
    }

    /**
     * Proses verifikasi email dari link
     */
    public function verify($token, $email)
    {
        // Cari data subscriber berdasarkan token dan email
        $subscriber_data = Subscriber::where('token', $token)
            ->where('email', $email)
            ->first();

        // Jika data ditemukan → verifikasi berhasil
        if ($subscriber_data) {
            $subscriber_data->token = '';       // hapus token
            $subscriber_data->status = 'Active'; // ubah status
            $subscriber_data->update();

            return redirect()->back()->with(
                'success',
                'Email Anda berhasil diverifikasi. Terima kasih sudah berlangganan!'
            );
        }

        // Jika tidak ditemukan → arahkan ke halaman home
        return redirect()->route('home');
    }
}
