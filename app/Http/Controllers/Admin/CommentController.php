<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');

        $counts = [
            'all' => Comment::count(),
            'pending' => Comment::where('status', 'pending')->count(),
            'approved' => Comment::where('status', 'approved')->count(),
            'spam' => Comment::where('status', 'spam')->count(),
            'trash' => Comment::where('status', 'trash')->count(),
        ];

        $comments = Comment::with('post')
            ->when($status !== 'all', fn ($q) => $q->where('status', $status))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.comments.index', compact('comments', 'counts', 'status'));
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:pending,approved,spam,trash'],
        ]);

        $comment->update($data);

        return back()->with('status', 'Status komentar diperbarui.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('status', 'Komentar dihapus permanen.');
    }
}
