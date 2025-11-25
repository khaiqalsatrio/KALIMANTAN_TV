<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\LiveChannel;

class LiveController extends Controller
{
    public function index()
    {
        $live_channels = LiveChannel::latest()->paginate(12);
        return view('front.live_stream', compact('live_channels'));
    }

    public function detail($id)
    {
        $live = LiveChannel::findOrFail($id);
        return view('front.detail_live', compact('live'));
    }
}
