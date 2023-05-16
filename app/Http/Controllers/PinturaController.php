<?php

namespace App\Http\Controllers;

use App\Models\Pintura;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $pinturas = Pintura::all();
        return view('pinturas.index', compact('pinturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $pintura = Pintura::find($id);
        return view('pinturas.index', compact('pintura'));
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
    public function update(Request $request, int $id)
    {
        //
        // $request->validate(
        //     [
        //         'nombre' => 'required'                
        //     ]
        //     );
        $pintura = Pintura::find($id);
        $pintura->nombre = $request->nombre;
        $pintura->siglo_año=$request->siglo_año;        
        if($imagen = $request->file('ruta_imagen')){
            $rutaGuardarImagen = 'images/';
            $imagenPintura = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen,$imagenPintura);
            $pintura->ruta_imagen = "$imagenPintura";
        }else{
            unset($pintura->ruta_imagen);
        }
        $pintura->update();
        return redirect()->route('pinturas.index');
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
