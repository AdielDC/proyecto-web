<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = Content::all();
        return response()->json($contents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'video' => 'required|url',
            'audio' => 'required|url',
            'fecha_publicacion' => 'required|date',
            'fecha_modificacion' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $content = Content::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $request->input('imagen'),
            'video' => $request->input('video'),
            'audio' => $request->input('audio'),
            'fecha_publicacion' => $request->input('fecha_publicacion'),
            'fecha_modificacion' => $request->input('fecha_modificacion'),
            'user_id' => $request->input('user_id'),
        ]);

        return response()->json($content);
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return response()->json($content);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'video' => 'required|url',
            'audio' => 'required|url',
            'fecha_publicacion' => 'required|date',
            'fecha_modificacion' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $content->titulo = $request->input('titulo');
        $content->descripcion = $request->input('descripcion');
        $content->imagen = $request->input('imagen');
        $content->video = $request->input('video');
        $content->audio = $request->input('audio');
        $content->fecha_publicacion = $request->input('fecha_publicacion');
        $content->fecha_modificacion = $request->input('fecha_modificacion');
        $content->user_id = $request->input('user_id');
        $content->save();

        return response()->json($content);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();

        return response()->json(['message' => 'Contenido eliminado con éxito']);
    }
}

