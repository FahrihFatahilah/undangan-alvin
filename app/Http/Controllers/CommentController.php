<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'attendance' => 'required|in:hadir,tidak,ragu',
        ]);

        $comment = Comment::create($validated);

        if ($request->wantsJson()) {
            return response()->json($comment, 201);
        }

        return back()->with('success', 'Ucapan berhasil dikirim!');
    }

    public function index()
    {
        $comments = Comment::latest()->take(10)->get();
        return response()->json($comments);
    }
}
