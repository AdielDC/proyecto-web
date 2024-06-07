<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return response()->json($news);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Selecciona un usuario aleatorio
        $randomUser = User::inRandomOrder()->first();
    
        // Ruta por defecto para la imagen
        $rutaImagen = null;
    
        // Maneja la carga de imágenes
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'imagenes/' . $filename;
            Storage::disk('public')->putFileAs('imagenes', $file, $filename);
            $rutaImagen = $filePath;
        }
    
        // Crea la noticia
        $news = News::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $rutaImagen,
            'fecha_publicacion' => $request->input('fecha_publicacion'),
            'user_id' => $randomUser->id,
        ]);
    
        return response()->json($news);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return response()->json($news);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'fecha_publicacion' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $news->titulo = $request->input('titulo');
        $news->descripcion = $request->input('descripcion');
        $news->imagen = $request->input('imagen');
        $news->fecha_publicacion = $request->input('fecha_publicacion');
        $news->user_id = $request->input('user_id');
        $news->save();

        return response()->json($news);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        return response()->json(['message' => 'Noticia eliminada con éxito']);
    }
}

