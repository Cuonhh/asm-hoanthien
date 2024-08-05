<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.news.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|unique:posts',
            'slug' => 'required|min:10|unique:posts',
            'short_description' => 'required|min:10|max:255',
            'content' => 'required|min:10',
            'category_id' => 'required',
            'image' => 'required|image'
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $request->image->store('images'),
            'hot_post' => $request->hot_post ?? 1
        ]);


        return redirect()->back()->with('status', 'Thêm bài post thành công');
    }

    public function edit($id) {
        $categories = Category::all();
        $post = Post::find($id);

        return view('admin.news.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|min:10',
            'slug' => 'required|min:10',
            'short_description' => 'required|min:10|max:255',
            'content' => 'required|min:10',
            'category_id' => 'required',
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->short_description = $request->short_description;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->hot_post = $request->hot_post ?? 1;
        if (isset($request->image)){
            Storage::delete($post->image);
            $post->image = $request->image->store('images');
        }

        $post->save();

        return redirect()->back()->with('status', 'Cập nhật bài post thành công');
    }
}
