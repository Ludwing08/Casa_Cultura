<?php

namespace App\Http\Controllers;

use App\Models\Pintura;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Autor;
use App\Models\Dimension;
use App\Models\Ingreso;

use Illuminate\Support\Facades\DB;

class PinturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $pinturas = Pintura::all();
        $autores = Autor::all();
        $dimensiones = Dimension::all();
        $ingresos = Ingreso::all();
        return view('pinturas.index', compact(['pinturas', 'autores']));
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

        DB::beginTransaction();
        try {

            $pintura = new Pintura();
            $pintura->codigo = $request->input("codigo");
            $pintura->codigo_alternativo = $request->input("codigo_alternativo");
            $pintura->ubicacion_actual = $request->input("ubicacion_actual");
            $pintura->nombre = $request->input("nombre");
            $pintura->siglo_año = $request->input("siglo_año");
            $pintura->firmado_atribuido_documento = $request->input("firmado_atribuido_documento");
            $pintura->estado_conservacion = $request->input("estado_conservacion");
            $pintura->estado_integridad = $request->input("estado_integridad");
            $pintura->tecnica = $request->input("tecnica");
            $pintura->soporte = $request->input("soporte");
            $pintura->id_autor = $request->input("id_autor");
            $pintura->ruta_imagen = $request->validate(["ruta_imagen" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"]);


            //$pintura = $request->all(); 

            if ($imagen = $request->file("ruta_imagen")) {
                $rutaGuardarImagen = "images/";
                $imagenPintura = date("YmdHis") . "." . $imagen->getClientOriginalExtension();
                $imagen->move($rutaGuardarImagen, $imagenPintura);
                $pintura->ruta_imagen = "$imagenPintura";
            }

            $pintura->save();

            //Agregar Dimension en la tabla dimensiones
            self::addDimensiones($request, $pintura->id);

            //Agregar Ingreso en la tabla ingresos
            self::addIngreso($request, $pintura->id);

            DB::commit();

            return redirect()->route("pinturas.index")->with("mensaje", "Pintura creada con éxito");

            //Ingreso   
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
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
        $dimensiones = Dimension::find($id);
        $ingresos = $this->formaIngreso($id);
        return view('pinturas.index', compact(['pintura', 'dimensiones', 'ingresos']));
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
    // public function update(Request $request, int $id)
    // {

    //     $pintura = Pintura::find($id);
    //     $pintura->codigo_alternativo = $request->codigo_alternativo;
    //     $pintura->nombre = $request->nombre;
    //     $pintura->siglo_año = $request->siglo_año;
    //     $pintura->firmado_atribuido_documento = $request->firmado_atribuido_documento;
    //     $pintura->ubicacion_firma = $request->ubicacion_firma;
    //     $pintura->estado_conservacion = $request->input("estado_conservacion");
    //     $pintura->estado_integridad = $request->input("estado_integridad");
    //     // $pintura->ruta_imagen = $request->validate(["ruta_imagen" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"]);
    //     $pintura->tecnica = $request->input("tecnica");
    //     $pintura->soporte = $request->input("soporte");        
    //     $pintura->ubicacion_actual = $request->input("ubicacion_actual");
    //     $pintura->id_autor = $request->input("id_autor");
    //     // $pintura->ruta_imagen = $request->validated()["ruta_imagen"];


    //     if ($imagen = $request->file('ruta_imagen')) {
    //         $rutaGuardarImagen = 'images/';
    //         $imagenPintura = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
    //         $imagen->move($rutaGuardarImagen, $imagenPintura);
    //         $pintura->ruta_imagen = "$imagenPintura";
    //     } else {
    //         unset($pintura->ruta_imagen);
    //     }


    //     $ingreso = Ingreso::where('id_pintura', $pintura->id)->firstOrFail();
    //     var_dump($ingreso);
    //     $ingreso->forma_ingreso = $request->input("forma_ingreso");
    //     $ingreso->valor = $request->input("valor");
    //     $ingreso->fecha_doc_ingreso = $request->input("fecha_doc_ingreso");
    //     $ingreso->fecha_registro = $request->input("fecha_registro");
    //     $ingreso->observaciones = $request->input("observaciones");
    //     $ingreso->avaluo = $request->input("avaluo");

    //     $pintura->update(); 
    //     $ingreso->update(); // Guarda los cambios en la tabla hija


    //     return redirect()->route('pinturas.index');

    // }

    public function update(Request $request, int $id)
    {
        $pintura = Pintura::findOrFail($id);
        $pintura->codigo_alternativo = $request->codigo_alternativo;
        $pintura->nombre = $request->nombre;
        $pintura->siglo_año = $request->siglo_año;
        $pintura->firmado_atribuido_documento = $request->firmado_atribuido_documento;
        $pintura->ubicacion_firma = $request->ubicacion_firma;
        $pintura->estado_conservacion = $request->input("estado_conservacion");
        $pintura->estado_integridad = $request->input("estado_integridad");
        $pintura->tecnica = $request->input("tecnica");
        $pintura->soporte = $request->input("soporte");
        $pintura->ubicacion_actual = $request->input("ubicacion_actual");
        $pintura->id_autor = $request->input("id_autor");

        if ($imagen = $request->file('ruta_imagen')) {
            $rutaGuardarImagen = 'images/';
            $imagenPintura = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenPintura);
            $pintura->ruta_imagen = $imagenPintura;
        } else {
            unset($pintura->ruta_imagen);
        }

        DB::beginTransaction();
        try {
            $pintura->save(); // Guarda los cambios en el modelo Pintura
            
            $ingreso = Ingreso::where('id_pintura', $pintura->id)->firstOrFail();
            // dd($ingreso);
            $ingreso->forma_ingreso = $request->input("forma_ingreso");
            $ingreso->valor = $request->input("valor");
            $ingreso->fecha_doc_ingreso = $request->input("fecha_doc_ingreso");
            $ingreso->fecha_registro = $request->input("fecha_registro");
            $ingreso->observaciones = $request->input("observaciones");
            $ingreso->avaluo = $request->input("avaluo");

            $ingreso->save();

            DB::commit();
            return redirect()->route('pinturas.index');
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
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

    public function addDimensiones(Request $request, $id_pintura)
    {

        $dimension = new Dimension();
        $dimension->id_pintura = $id_pintura;
        $dimension->alto_obra = $request->input("alto_obra");
        $dimension->ancho_obra = $request->input("ancho_obra");
        $dimension->profundidad_obra = $request->input("profundidad_obra");
        $dimension->diametro_mayor_obra = $request->input("diametro_mayor_obra");
        $dimension->diametro_menor_obra = $request->input("diametro_menor_obra");
        $dimension->plancha_grabado_alto = $request->input("plancha_grabado_alto");
        $dimension->plancha_grabado_ancho = $request->input("plancha_grabado_ancho");
        $dimension->plancha_grabado_numero = $request->input("plancha_grabado_numero");
        $dimension->marco_alto = $request->input("marco_alto");
        $dimension->marco_ancho = $request->input("marco_ancho");
        $dimension->marco_profundidad = $request->input("marco_profundidad");

        $dimension->save();
    }

    public function addIngreso(Request $request, $id_pintura)
    {

        $ingreso = new Ingreso();
        $ingreso->id_pintura = $id_pintura;
        $ingreso->forma_ingreso = $request->input("forma_ingreso");
        $ingreso->valor = $request->input("valor");
        $ingreso->fecha_doc_ingreso = $request->input("fecha_doc_ingreso");
        $ingreso->fecha_registro = $request->input("fecha_registro");
        $ingreso->observaciones = $request->input("observaciones");
        $ingreso->avaluo = $request->input("avaluo");

        $ingreso->save();
    }

    public function updateIngreso(Request $request, $id_pintura)
    {

        $ingreso = Ingreso::where('id_pintura', $id_pintura)->first();
        $ingreso->id_pintura = $id_pintura;
        $ingreso->forma_ingreso = $request->input("forma_ingreso");
        $ingreso->valor = $request->input("valor");
        $ingreso->fecha_doc_ingreso = $request->input("fecha_doc_ingreso");
        $ingreso->fecha_registro = $request->input("fecha_registro");
        $ingreso->observaciones = $request->input("observaciones");
        $ingreso->avaluo = $request->input("avaluo");

        $ingreso->save();
    }
}
