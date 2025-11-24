<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_news = \App\Models\Post::count(); // hitung total berita

        return view('admin.home', compact('total_news'));
    }
}
