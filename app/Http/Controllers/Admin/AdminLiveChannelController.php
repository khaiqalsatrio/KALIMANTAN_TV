<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveChannel;

class AdminLiveChannelController extends Controller
{
    public function show()
    {
        $live_channels = LiveChannel::get();
        return view('admin.live_channel_show', compact('live_channels'));
    }

    public function create()
    {
        return view('admin.live_channel_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'video_id' => 'required'
        ]);

        $live_channel = new LiveChannel();
        $live_channel->video_id = $request->video_id;
        $live_channel->heading = $request->heading;
        $live_channel->save();

        return redirect()->route('admin_live_channel_show')->with('success', 'Informasi saluran langsung telah berhasil disimpan.');
    }

    public function edit($id)
    {
        $live_channel_single = LiveChannel::where('id', $id)->first();

        return view('admin.live_channel_edit', compact('live_channel_single'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'heading' => 'required',
            'video_id' => 'required'
        ]);

        $live_channel = LiveChannel::where('id', $id)->first();
        $live_channel->heading = $request->heading;
        $live_channel->video_id = $request->video_id;
        $live_channel->update();

        return redirect()->route('admin_live_channel_show')->with('success', 'Informasi saluran langsung telah berhasil diubah.');
    }

    public function delete($id)
    {

        $live_channel = LiveChannel::where('id', $id)->first();
        $live_channel->delete();

        return redirect()->route('admin_live_channel_show')->with('success', 'Informasi saluran langsung telah berhasil dihapus.');
    }
}
