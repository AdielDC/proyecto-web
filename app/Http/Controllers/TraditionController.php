<?php

namespace App\Http\Controllers;

use App\Models\Tradition;
use App\Models\Content;
use Illuminate\Http\Request;

class TraditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $traditions = Tradition::all();
    return response()->json($traditions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tradition = Tradition::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $request->input('imagen'),
            'content_id' => $request->input('content_id'),
        ]);
    
        return response()->json($tradition);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tradition $tradition)
    {
        return response()->json($tradition);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tradition $tradition)
    {
        $tradition->nombre = $request->input('nombre');
        $tradition->descripcion = $request->input('descripcion');
        $tradition->imagen = $request->input('imagen');
        $tradition->content_id = $request->input('content_id');
        $tradition->save();
    
        return response()->json($tradition);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tradition $tradition)
    {
        $tradition->delete();

        return response()->json(['message' => 'Tradición eliminada con éxito']);
    }
}

