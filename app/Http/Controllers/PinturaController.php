<?php

namespace App\Http\Controllers;

use App\Models\Pintura;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Autor;

class PinturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $autores = Autor::all();
        return view("pinturas.create", compact("autores"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request -> validate([
            "codigo" => "required",
            "nombre" => "required",
            "sigo_año" => "required",
            "firmado_atribuido_documento" => "required",
            "estado_conservacion" => "required",
            "estado_integridad" => "required",
            "ruta_imagen" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "id_autor" => "required"
        ]);

        $pintura = $request->all(); 

        if($imagen = $request->file("ruta_imagen")){
            $rutaGuardarImagen = "images/";
            $imagenPintura = date("YmdHis").".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenPintura);
            $pintura["ruta_imagen"] = "$imagenPintura";
        }

        Pintura::create($pintura);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function show(Pintura $pintura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function edit(Pintura $pintura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pintura $pintura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pintura $pintura)
    {
        //
    }
}
