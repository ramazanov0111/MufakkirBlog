<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard() {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(3),
            'posts' => Post::lastPosts(3),
            'count_categories' => Category::count(),
            'count_posts' => Post::count(),
//            'count_users' => User::count(),
        ]);
    }
}
