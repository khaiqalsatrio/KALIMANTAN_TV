<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

use App\Models\Admin;
use App\Models\Page;
use App\Mail\Websitemail;

class ContactController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        return view('front.contact', compact('page_data'));
    }

    public function send_email(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        if (!$validator->passes()) {
            return response()->json([
                'result' => false,
                'error_message' => $validator->errors()->toArray()
            ]);
        }
        // Ambil email admin
        $admin_data = Admin::where('id', 1)->first();
        $email = $admin_data->email;
        // Isi email
        $subject = 'Contact Form Email';
        $message = 'Visitor Message Detail:<br>';
        $message .= '<b>Visitor Name: </b>' . $request->name . '<br>';
        $message .= '<b>Visitor Email: </b>' . $request->email . '<br>';
        $message .= '<b>Visitor Message: </b>' . $request->message;
        Mail::to($email)->send(new Websitemail($subject, $message));
        return response()->json([
            'result' => true,
            'success_message' => 'Email Anda telah terkirim. Terima kasih..'
        ]);
    }
}
