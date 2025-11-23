<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function show()
    {
        $categories  = Category::orderBy('category_order', 'asc')->get();
        return view('admin.category_show', compact('categories'));
    }

    public function create()
    {
        return view('admin/category_create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required',
        ]);
        $category_data = new Category();
        $category_data->category_name = $request->category_name;
        $category_data->show_on_menu = $request->show_on_menu;
        $category_data->category_order = $request->category_order;
        $category_data->save();
        return redirect()->route('admin_category_show')->with('success', 'Kategori berhasil dibuat.');
    }

    public function edit($id)
    {
        $category_single = Category::where('id', $id)->first();
        return view('admin.category_edit', compact('category_single'));
    }

    public function update(Request $request, $id)
    {
        $category_data = Category::where('id', $id)->first();
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required',
        ]);
        $category_data->category_name = $request->category_name;
        $category_data->show_on_menu = $request->show_on_menu;
        $category_data->category_order = $request->category_order;
        $category_data->update();
        return redirect()->route('admin_category_show')->with('success', 'Informasi kategori telah berhasil diubah.');
    }

    public function delete($id)
    {
        $category_data = Category::where('id', $id)->first();
        $category_data->delete();
        return redirect()->route('admin_category_show')->with('success', 'Informasi kategori telah berhasil dihapus.');
    }
}
