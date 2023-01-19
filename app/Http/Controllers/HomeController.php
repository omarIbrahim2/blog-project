<?php

namespace App\Http\Controllers;

use App\Repositories\PostsRepo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(PostsRepo $postRepo){
         $posts = $postRepo->allPosts();
        return view('web.home')->with([
            'posts' => $posts
        ]);
    }
}
