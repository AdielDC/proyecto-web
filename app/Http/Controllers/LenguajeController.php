<?php

namespace App\Http\Controllers;

use App\Models\Lenguaje;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LenguajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lenguajes = Lenguaje::all();
        return response()->json($lenguajes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lenguaje = Lenguaje::create([
            'nombre' => $request->input('nombre'),
            'pronunciacion' => $request->input('pronunciacion'),
            'significado' => $request->input('significado'),
            'content_id' => $request->input('content_id'),
        ]);
    
        return response()->json($lenguaje);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lenguaje $lenguaje)
    {
        return response()->json($lenguaje);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lenguaje $lenguaje)
    {
        $request->validate([
            'nombre' => 'required',
            'pronunciacion' => 'required',
            'significado' => 'required',
            'content_id' => 'required|exists:contents,id',
        ]);
    
        $lenguaje->nombre = $request->input('nombre');
        $lenguaje->pronunciacion = $request->input('pronunciacion');
        $lenguaje->significado = $request->input('significado');
        $lenguaje->content_id = $request->input('content_id');
        $lenguaje->save();
    
        return response()->json($lenguaje);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lenguaje $lenguaje)
    {
        $lenguaje->delete();

        return response()->json(['message' => 'Lenguaje eliminada con éxito']);
}
}
