<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('blog.category', [
            'category' => $category,
            'posts' => $category->posts()->where('published', 1)->paginate(12)
        ]);
    }

    public function home()
    {
        $categories = Category::all();

        return view('blog.home', [
            'categories' => $categories,
            'posts' => Post::lastPosts(10)->where('published', 1),
        ]);
    }


    public function post($slug) {
        return view('blog.post', [
            'post' => Post::where('slug', $slug)->first()
        ]);
    }
}
