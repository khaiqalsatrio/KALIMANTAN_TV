<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

class AdminPostController extends Controller
{
    private function safeDelete($path)
    {
        if (!empty($path) && file_exists($path) && is_file($path)) {
            unlink($path);
        }
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
            'category_id' => 'required',
            'post_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
        $data = new Post();
        $data->post_title = $request->post_title;
        $data->post_detail = $request->post_detail;
        $data->category_id = $request->category_id;
        $data->admin_id = Auth::guard('admin')->user()->id;
        if ($request->hasFile('post_photo')) {
            $ext = $request->file('post_photo')->extension();
            $final = 'post_file_' . time() . '.' . $ext;
            // $request->file('post_photo')->move(public_path('uploads/post/'), $final);
            $request->file('post_photo')->move($_SERVER['DOCUMENT_ROOT'] . '/uploads/post/', $final);
            $data->post_photo = $final;
        }
        $data->post_slug = Str::slug($request->post_title);
        $data->visitor_count = 0;
        $data->save();
        if ($request->filled('post_tag')) {
            $tags = explode(',', $request->post_tag);
            foreach ($tags as $tag) {
                Tag::create([
                    'post_id' => $data->id,
                    'tag_name' => trim($tag),
                ]);
            }
        }
        return redirect()->route('admin_post_show')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::with('tags')->findOrFail($id);
        $categories = Category::orderBy('category_name', 'asc')->get();

        return view('admin.post.edit', compact('post', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
            'category_id' => 'required',
            'post_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->category_id = $request->category_id;
        $post->post_slug = Str::slug($request->post_title);
        // if ($request->hasFile('post_photo')) {
        //     // delete old
        //     if ($post->post_photo) {
        //         $this->safeDelete(public_path('uploads/post/' . $post->post_photo));
        //     }
        //     // upload baru
        //     $ext = $request->file('post_photo')->extension();
        //     $final = 'post_' . time() . '.' . $ext;
        //     // $request->file('post_photo')->move(public_path('uploads/post/'), $final);
        //     $request->file('post_photo')->move($_SERVER['DOCUMENT_ROOT'].'/uploads/post/', $final);
        //     $post->post_photo = $final;
        // }
        if ($request->hasFile('post_photo')) {
            // delete old
            if ($post->post_photo) {
                $this->safeDelete($_SERVER['DOCUMENT_ROOT'] . '/uploads/post/' . $post->post_photo);
            }
            // upload baru
            $ext = $request->file('post_photo')->extension();
            $final = 'post_' . time() . '.' . $ext;
            $request->file('post_photo')->move($_SERVER['DOCUMENT_ROOT'] . '/uploads/post/', $final);
            $post->post_photo = $final;
        }
        $post->save();
        // Update Tag
        Tag::where('post_id', $id)->delete();
        if ($request->filled('post_tag')) {
            foreach (explode(',', $request->post_tag) as $tag) {
                Tag::create([
                    'post_id' => $id,
                    'tag_name' => trim($tag),
                ]);
            }
        }
        return redirect()->route('admin_post_show')->with('success', 'Post updated successfully');
    }

    // public function delete($id)
    // {
    //     $post = Post::findOrFail($id);
    //     if (!empty($post->post_photo)) {
    //         $file = public_path('uploads/post/' . $post->post_photo);
    //         $this->safeDelete($file);
    //     }
    //     Tag::where('post_id', $id)->delete();
    //     $post->delete();
    //     return redirect()->route('admin_post_show')->with('success', 'Post deleted successfully');
    // }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        if (!empty($post->post_photo)) {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/uploads/post/' . $post->post_photo;
            $this->safeDelete($file);
        }
        Tag::where('post_id', $id)->delete();
        $post->delete();
        return redirect()->route('admin_post_show')->with('success', 'Post deleted successfully');
    }
}
