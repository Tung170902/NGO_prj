<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{

    public function index()
    {
        return view('pages.about');
    }

}