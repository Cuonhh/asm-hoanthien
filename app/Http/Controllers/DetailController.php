<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class DetailController extends Controller
{
    public function index($slug) {
        $post = Post::where('slug', $slug)->first();
        $postNew = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $postView = Post::orderBy('views', 'desc')->limit(5)->get();
        $postLQ =  Post::where('category_id', $post->category_id)->limit(5)->get();
        $views = $post->views++;
        $post->update(['views', $views]); 

        return view('pages.detail', [
            'post' => $post,
            'postNew'=>$postNew,
            'postView'=>$postView,
            'postLQ' => $postLQ,
            'idPost' => $post->id,
            'title'=> $post->title
        ]);
    }
}
