<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->latest('created_at')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['published_at'] = $request->boolean('publish') ? now() : null;
        $data['cover_image'] = $this->resolveCoverImage($request);

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('status', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validated($request, $post->id);

        if ($data['title'] !== $post->title) {
            $data['slug'] = $this->uniqueSlug($data['title'], $post->id);
        }

        $data['published_at'] = $request->boolean('publish') ? ($post->published_at ?? now()) : null;

        $newCover = $this->resolveCoverImage($request);
        // Only overwrite the existing cover if the admin actually uploaded a file
        // or typed a new URL. Otherwise keep whatever the post already had.
        if ($newCover !== null) {
            $data['cover_image'] = $newCover;
        } elseif ($request->boolean('remove_cover_image')) {
            $data['cover_image'] = null;
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('status', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('status', 'Artikel berhasil dihapus.');
    }

    private function validated(Request $request, ?int $ignorePostId = null): array
    {
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'author_name' => ['nullable', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'cover_image_url' => ['nullable', 'url', 'max:2048'],
            'cover_image_file' => ['nullable', 'file', 'mimes:jpg,jpeg,png,gif,webp,bmp,svg', 'max:51200'],
        ]);

        $data['author_name'] = $data['author_name'] ?: 'SOCA Team';

        unset($data['cover_image_url'], $data['cover_image_file']);

        return $data;
    }

    /**
     * Figure out the cover image: an uploaded file wins over a pasted URL.
     * Returns null when neither was provided (caller decides what that means).
     */
    private function resolveCoverImage(Request $request): ?string
    {
        if ($request->hasFile('cover_image_file')) {
            $path = $request->file('cover_image_file')->store('covers', 'public');

            return Storage::url($path);
        }

        if ($request->filled('cover_image_url')) {
            return $request->input('cover_image_url');
        }

        return null;
    }

    private function uniqueSlug(string $title, ?int $ignorePostId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;

        while (
            Post::where('slug', $slug)
                ->when($ignorePostId, fn ($q) => $q->where('id', '!=', $ignorePostId))
                ->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}