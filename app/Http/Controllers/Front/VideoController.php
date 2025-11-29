<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $video_data = Video::orderBy('id', 'desc')->paginate(10);

        return view('front.video_gallery', compact('video_data'));
    }

    public function detail($id)
    {
        $video = Video::findOrFail($id);
        return view('front.detail_video', compact('video'));
    }
}
