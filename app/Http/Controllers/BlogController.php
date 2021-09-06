<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        return view('pages.blog', [
            'posts' => $posts
        ]);
    }

    public function detail($slug)
    {
        $post = Post::where('slug','=', $slug)->first();
        return view('pages.blog-detail', [
            'post' => $post
        ]);
    }

}