<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class AdminSubCategoryController extends Controller
{
    public function show()
    {
        $sub_categories  = Category::with('rCategory')
            ->orderBy('sub_category_order', 'asc')
            ->get();
        return view('admin.sub_category_show', compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('category_order', 'asc')->get();
        return view('admin.sub_category_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
            'category_id' => 'required'
        ]);
        Category::create([
            'sub_category_name' => $request->sub_category_name,
            'show_on_menu' => $request->show_on_menu,
            'show_on_home' => $request->show_on_home,
            'sub_category_order' => $request->sub_category_order,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin_sub_category_show')
            ->with('success', 'Sub Category berhasil dibuat.');
    }

    public function edit($id)
    {
        $sub_category_single = Category::findOrFail($id);
        $category_data = Category::orderBy('id', 'asc')->get();
        return view('admin.sub_category_edit', compact('sub_category_single', 'category_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
            'category_id' => 'required'
        ]);
        $sub_category_data = Category::findOrFail($id);
        $sub_category_data->update([
            'sub_category_name' => $request->sub_category_name,
            'show_on_menu' => $request->show_on_menu,
            'show_on_home' => $request->show_on_home,
            'sub_category_order' => $request->sub_category_order,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin_sub_category_show')
            ->with('success', 'Sub Category berhasil diperbarui.');
    }

    public function delete($id)
    {
        $sub_category_data = Category::findOrFail($id);
        $sub_category_data->delete();
        return redirect()->route('admin_sub_category_show')
            ->with('success', 'Sub Category berhasil dihapus.');
    }
}
