@extends('principal')

@section('content')
    
    <form action="{{ route('pinturas.store') }}" method="Post" enctype="multipart/form-data">

        @csrf

        <div class="card border-primary">
          <div class="card-body">

            <div class="container">
                <!--Titulo-->
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-12">
                        <h2>Registro de Pinturas</h2>
                    </div>  
                </div>
                
                <!--Datos Generales-->
                <div class="row">
                    <div class="col-7">
                        <div class="card text-start">
                          <div class="card-body">
                            <h5 class="card-title">Datos generales</h5>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Código</label>
                                        <input type="text"
                                          class="form-control" name="codigo" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Otros Códigos</label>
                                        <input type="text"
                                          class="form-control" name="codigo_alternativo" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nombre</label>
                                        <input type="text"
                                          class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Siglo/Año</label>
                                        <input type="text"
                                          class="form-control" name="siglo_año" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                            </div>
    
                            
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="firmado_atribuido_documento" id="">
                              <label class="form-check-label" for="">
                                Firmado
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="" id="" checked disabled>
                              <label class="form-check-label" for="">
                                Atribuido
                              </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="" id="" checked disabled>
                                <label class="form-check-label" for="">
                                  Documento
                                </label>
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Ubicación de la firma</label>
                                <input type="text"
                                  class="form-control" name="ubicacion_firma" id="" aria-describedby="helpId" placeholder="">
                            </div>
    
    
                            <div class="mb-3">
                                <label for="" class="form-label">Autor</label>
                                <select class="form-select form-select-md" name="id_autor" id="">
                                    @foreach ($autores as $autor)
                                        <option value="{{$autor->id}}" selected>{{$autor->nombres ." ". $autor->apellidos}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Técnica</label>
                                        <input type="text"
                                          class="form-control" name="tecnica" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Soporte</label>
                                        <input type="text"
                                          class="form-control" name="soporte" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                            </div>
    
    
                          </div>
                        </div>
                    </div>
        
                    <!--Imagen-->
                    <div class="col-5">
                        <div class="card text-start">
                            <div class="card-body">
                              <h4 class="card-title">Imagen Pintura</h4>
                              <div class="mb-3">
                                <label for="" class="form-label">Escoja la imagen</label>
                                <input type="file" class="form-control" name="ruta_imagen" id="imagen_seleccionada" placeholder="" aria-describedby="fileHelpId">
                                <div id="fileHelpId" class="form-text">
                                    <img src="" id="preview" style="max-height: 300px; max-width: 300px;">
                                </div>
                              </div>
                            </div>
                        </div>

                        <!--Dimensiones-->
                        <div class="row mt-4">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Dimensiones</h4>

                              <div class="row">

                              <div class="col-4"> Obra en cm
                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="alto_obra" id="" aria-describedby="helpId" placeholder="Alto">
                                    </div>
                                  
                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="ancho_obra" id="" aria-describedby="helpId" placeholder="Ancho">
                                    </div>

                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="profundidad_obra" id="" aria-describedby="helpId" placeholder="Prof.">
                                    </div>
                                  
                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="diametro_mayor_obra" id="" aria-describedby="helpId" placeholder="D.Mayor">
                                    </div>

                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="diametro_menor_obra" id="" aria-describedby="helpId" placeholder="D.Menor">
                                    </div>
                              </div>
                              

                              <div class="col-4"> Plancha Grabado
                                <div class="row">
                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="plancha_grabado_alto" id="" aria-describedby="helpId" placeholder="Alto">
                                    </div>
                                  
                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="plancha_grabado_ancho" id="" aria-describedby="helpId" placeholder="Ancho">
                                    </div>

                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="plancha_grabado_numero" id="" aria-describedby="helpId" placeholder="Num.">
                                    </div>
                                    
                                </div>
                              </div>

                              <div class="col-4"> Marco/Elemento
                                <div class="row">
                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="marco_alto" id="" aria-describedby="helpId" placeholder="Alto">
                                    </div>
                                  
                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="marco_ancho" id="" aria-describedby="helpId" placeholder="Ancho">
                                    </div>

                                    <div class="mb-3">
                                      <input type="text"
                                        class="form-control" name="marco_profundidad" id="" aria-describedby="helpId" placeholder="Prof.">
                                    </div>
                                    
                                </div>
                              </div>

                            </div>

                            </div>
                          </div>
                        </div>

                    </div>
                </div>
        
                <!--Estados-->
                <div class="row mt-4">
                    <!--Estado Conservacion-->
                    <div class="col-6">
                        <div class="card text-start">
                            <div class="card-body">
                              <h5 class="card-title">Estado de Conservación:</h5>
                              
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_conservacion" id="">
                                <label class="form-check-label" for="">
                                  Bueno
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="" id="" checked disabled>
                                <label class="form-check-label" for="">
                                  Regular
                                </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="" id="" checked disabled>
                                  <label class="form-check-label" for="">
                                    Malo
                                  </label>
                              </div>
    
                            </div>
                        </div>
                    </div>
        
                    <!--Estado Integridad-->
                    <div class="col-6">
                        <div class="card text-start">
                            <div class="card-body">
                              <h5 class="card-title">Estado de Integridad:</h5>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="estado_integridad" id="">
                                <label class="form-check-label" for="">
                                  Completo
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="" id="" checked disabled>
                                <label class="form-check-label" for="">
                                  Incompleto
                                </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="radio" name="" id="" checked disabled>
                                  <label class="form-check-label" for="">
                                    Unido
                                  </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="" id="" checked disabled>
                                <label class="form-check-label" for="">
                                  Fragmentado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="" id="" checked disabled>
                                <label class="form-check-label" for="">
                                  Agregado
                                </label>
                            </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
        
                <!--Ingreso-->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card text-start">
                            <div class="card-body">
                              <h5 class="card-title">Ingreso:</h5>
                              
                              <div class="row">
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Forma de Ingreso</label>
                                        <input type="text"
                                          class="form-control" name="forma_ingreso" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Valor USD</label>
                                        <input type="number"
                                          class="form-control" name="valor" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Avalúo</label>
                                        <input type="number"
                                          class="form-control" name="avaluo" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Fecha Doc. Ingreso</label>
                                        <input type="text"
                                          class="form-control" name="fecha_doc_ingreso" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Fecha registro</label>
                                        <input type="text"
                                          class="form-control" name="fecha_registro" id="" aria-describedby="helpId" placeholder="">
                                      </div>
                                </div>
                            </div>
    
    
                            <div class="mb-3">
                                <label for="" class="form-label">Observaciones</label>
                                <input type="text"
                                    class="form-control" name="observaciones" id="" aria-describedby="helpId" placeholder="">
                            </div>
                              
    
                            
    
                            </div>
                        </div>
                    </div>
                </div>
                    
                <button type="submit" class="btn btn-primary">Guardar Pintura</button>
                    
            </div>
            
          </div>
        </div>

       
    </form>
    

    <script>
        const input = document.getElementById('imagen_seleccionada');
        const preview = document.getElementById('preview');

        input.addEventListener('change', () => {
            const file = input.files[0];
            const reader = new FileReader();

            reader.addEventListener('load', () => {
            preview.src = reader.result;
            });

            if (file) {
            reader.readAsDataURL(file);
            }
        });
    </script>

@endsection