<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Homepage: latest published posts, paginated.
     */
    public function index()
    {
        $posts = Post::with('category')
            ->published()
            ->latest('published_at')
            ->paginate(Setting::current()->posts_per_page);

        $categories = Category::withCount('posts')->get();

        return view('blog.index', compact('posts', 'categories'));
    }

    /**
     * Single post page.
     */
    public function show(Post $post)
    {
        abort_unless($post->published_at && $post->published_at->lte(now()), 404);

        $related = Post::with('category')
            ->published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $comments = $post->comments()->approved()->latest()->get();

        return view('blog.show', compact('post', 'related', 'comments'));
    }

    /**
     * Posts filtered by category.
     */
    public function category(Category $category)
    {
        $posts = $category->posts()
            ->with('category')
            ->published()
            ->latest('published_at')
            ->paginate(Setting::current()->posts_per_page);

        $categories = Category::withCount('posts')->get();

        return view('blog.category', compact('posts', 'category', 'categories'));
    }
}
