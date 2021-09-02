<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email',
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->blog_id = $request->blog;
        $comment->user_id = $request->user;
        $comment->save();

        session()->flash('success', 'Commentaire bien ajouté !');

        return redirect()->back();
    }

}
