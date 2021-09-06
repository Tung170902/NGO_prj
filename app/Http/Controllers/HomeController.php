<?php

namespace App\Http\Controllers;

use App\Models\Blog\Post;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::where('active','=',1)->orderBy('id', 'desc')->paginate(3);
        $posts = Post::where('active','=',1)->orderBy('id', 'desc')->paginate(3);
        return view('pages.home', [
            'posts' => $posts,
            'campaigns' => $campaigns,
        ]);
    }

}