<?php

namespace App\Http\Controllers;

use App\Models\Costume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CostumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costumes = Costume::all();
    return response()->json($costumes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $costume = Costume::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $request->file('imagen')->store('imagenes', 'public'),
            'content_id' => $request->input('content_id')
        ]);
    
        return response()->json($costume, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Costume $costume)
    {
        return response()->json($costume);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Costume $costume)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'content_id' => 'required|exists:contents,id',
        ]);

        $costume->nombre = $request->input('nombre');
        $costume->descripcion = $request->input('descripcion');
        $costume->imagen = $request->input('imagen');
        $costume->content_id = $request->input('content_id');
        $costume->save();

        return response()->json($costume);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Costume $costume)
    {
        $costume->delete();

        return response()->json(['message' => 'Traje eliminada con éxito']);
    }
}

