<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Post::count(),
            'published' => Post::whereNotNull('published_at')->count(),
            'draft' => Post::whereNull('published_at')->count(),
            'categories' => Category::count(),
        ];

        $recentPosts = Post::with('category')->latest('created_at')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts'));
    }
}
