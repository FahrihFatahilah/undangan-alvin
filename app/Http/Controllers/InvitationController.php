<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index(Request $request)
    {
        $guestName = ucwords(strtolower($request->query('to', 'Bapak/Ibu/Saudara/i')));
        $comments = Comment::latest()->take(10)->get();
        return view('invitation.index', compact('guestName', 'comments'));
    }
}
