<?php

namespace App\Http\Controllers;

use App\Models\Book;
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

    public function home(Book $book)
    {
        $categories = Category::where('published', 1)->paginate(4);

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

    public function bookItem($slug) {
//        dd($slug);
        return view('blog.book', [
            'book' => Book::where('slug', $slug)->first()
        ]);
    }

    public function bookList($type) {
        return view('blog.book_list', [
            'books' => Book::where('type', $type)->paginate(10),
        ]);
    }
}
