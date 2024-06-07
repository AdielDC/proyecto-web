<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comentario' => 'required',
            'fecha_publicacion' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'content_id' => 'required|exists:contents,id',
        ]);

        $comment = new Comment();
        $comment->comentario = $request->input('comentario');
        $comment->fecha_publicacion = $request->input('fecha_publicacion');
        $comment->user_id = $request->input('user_id');
        $comment->content_id = $request->input('content_id');
        $comment->save();

        return redirect()->route('comments.index')->with('success', 'Comentario creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'comentario' => 'required',
            'fecha_publicacion' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'content_id' => 'required|exists:contents,id',
        ]);

        $comment->comentario = $request->input('comentario');
        $comment->fecha_publicacion = $request->input('fecha_publicacion');
        $comment->user_id = $request->input('user_id');
        $comment->content_id = $request->input('content_id');
        $comment->save();

        return redirect()->route('comments.index')->with('success', 'Comentario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comentario eliminado con éxito');
    }
}
