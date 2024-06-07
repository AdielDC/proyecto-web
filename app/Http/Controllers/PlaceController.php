<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Content;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return response()->json($places);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'content_id' => 'required|exists:contents,id',
        ]);

        $place = Place::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'imagen' => $request->input('imagen'),
            'content_id' => $request->input('content_id'),
        ]);

        return response()->json($place);
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        return response()->json($place);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image',
            'content_id' => 'required|exists:contents,id',
        ]);

        $place->nombre = $request->input('nombre');
        $place->descripcion = $request->input('descripcion');
        $place->imagen = $request->input('imagen');
        $place->content_id = $request->input('content_id');
        $place->save();

        return response()->json($place);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return response()->json(['message' => 'Lugar eliminado con éxito']);
    }
}
