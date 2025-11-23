<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function show()
    {
        $faq_data  = Faq::orderBy('id', 'asc')->get();
        return view('admin.faq_show', compact('faq_data'));
    }

    public function create()
    {
        return view('admin/faq_create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);
        $faq_data = new Faq();
        $faq_data->faq_title = $request->faq_title;
        $faq_data->faq_detail = $request->faq_detail;
        $faq_data->save();
        return redirect()->route('admin_faq_show')->with('success', 'FAQ telah berhasil dibuat.');
    }

    public function edit($id)
    {
        $faq_single = Faq::where('id', $id)->first();
        return view('admin.faq_edit', compact('faq_single'));
    }

    public function update(Request $request, $id)
    {
        $faq_data = Faq::where('id', $id)->first();
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);
        $faq_data->faq_title = $request->faq_title;
        $faq_data->faq_detail = $request->faq_detail;
        $faq_data->update();
        return redirect()->route('admin_faq_show')->with('success', 'Informasi FAQ Anda telah berhasil diubah.');
    }

    public function delete($id)
    {
        $faq_data = Faq::where('id', $id)->first();
        $faq_data->delete();
        return redirect()->route('admin_faq_show')->with('success', 'Informasi FAQ telah berhasil dihapus.');
    }
}
