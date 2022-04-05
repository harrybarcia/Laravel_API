<?php

namespace App\Http\Controllers;

use App\Models\blogPost;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    public function index()
    {
        return blogPost::all();
    }
}
