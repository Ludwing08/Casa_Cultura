  <!-- Modal Edit Nueva Categoria -->
  <div class="modal fade modal-xl" id="edit{{$pintura->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Registro de la Pintura</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <!--Formulario-->
              <form method="post" action="{{route('pinturas.update', $pintura->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                      <div class="container">
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
                                                      <input type="text" class="form-control" name="codigo" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->codigo}}">
                                                  </div>
                                              </div>
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Otros Códigos</label>
                                                      <input type="text" class="form-control" name="codigo_alternativo" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->codigo_alternativo}}">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Nombre</label>
                                                      <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->nombre}}">
                                                  </div>
                                              </div>
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Siglo/Año</label>
                                                      <input type="text" class="form-control" name="siglo_año" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->siglo_año}}">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="firmado_atribuido_documento" id="" value="firmado" @if($pintura->firmado_atribuido_documento === 'firmado') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Firmado
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="firmado_atribuido_documento" id="" value="atribuido" @if($pintura->firmado_atribuido_documento === 'atribuido') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Atribuido
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="firmado_atribuido_documento" id="" value="documento" @if($pintura->firmado_atribuido_documento === 'documento') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Documento
                                              </label>
                                          </div>

                                          <div class="mb-3">
                                              <label for="" class="form-label">Ubicación de la firma</label>
                                              <input type="text" class="form-control" name="ubicacion_firma" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ubicacion_firma}}">
                                          </div>


                                          <div class="mb-3">
                                              <label for="" class="form-label">Autor</label>
                                              <select class="form-select form-select-md" name="id_autor" id="">
                                                  @foreach ($autores as $autor)
                                                  <option value="{{$autor->id}}" @if ($autor->id === $pintura->autores->id) selected @endif> {{$autor->nombres ." ". $autor->apellidos}}</option>
                                                  @endforeach
                                              </select>
                                          </div>

                                          <div class="row">
                                              <div class="col-6">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Técnica</label>
                                                      <input type="text" class="form-control" name="tecnica" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->tecnica}}">
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Soporte</label>
                                                      <input type="text" class="form-control" name="soporte" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->soporte}}">
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
                                              <input type="file" accept="image/*" class="form-control" name="ruta_imagen" id="imagen_seleccionada" placeholder="" aria-describedby="fileHelpId">
                                              <div id="fileHelpId" class="form-text">
                                                  <img src="/images/{{$pintura->ruta_imagen}}" id="preview" style="max-height: 300px; max-width: 300px;">
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
                                                          <input type="text" class="form-control" name="alto_obra" id="" aria-describedby="helpId" placeholder="Alto" value="{{ $pintura->dimensiones->first()->alto_obra }}">
                                                      </div>

                                                      <div class="mb-3">
                                                          <input type="text" class="form-control" name="ancho_obra" id="" aria-describedby="helpId" placeholder="Ancho" value="{{ $pintura->dimensiones->first()->ancho_obra }}">
                                                      </div>

                                                      <div class="mb-3">
                                                          <input type="text" class="form-control" name="profundidad_obra" id="" aria-describedby="helpId" placeholder="Prof." value="{{ $pintura->dimensiones->first()->profundidad_obra }}">
                                                      </div>

                                                      <div class="mb-3">
                                                          <input type="text" class="form-control" name="diametro_mayor_obra" id="" aria-describedby="helpId" placeholder="D.Mayor" value="{{ $pintura->dimensiones->first()->diametro_mayor_obra }}">
                                                      </div>

                                                      <div class="mb-3">
                                                          <input type="text" class="form-control" name="diametro_menor_obra" id="" aria-describedby="helpId" placeholder="D.Menor" value="{{ $pintura->dimensiones->first()->diametro_menor_obra }}">
                                                      </div>
                                                  </div>


                                                  <div class="col-4"> Plancha Grabado
                                                      <div class="row">
                                                          <div class="mb-3">
                                                              <input type="text" class="form-control" name="plancha_grabado_alto" id="" aria-describedby="helpId" placeholder="Alto" value="{{ $pintura->dimensiones->first()->plancha_grabado_alto }}">
                                                          </div>

                                                          <div class="mb-3">
                                                              <input type="text" class="form-control" name="plancha_grabado_ancho" id="" aria-describedby="helpId" placeholder="Ancho" value="{{ $pintura->dimensiones->first()->plancha_grabado_ancho }}">
                                                          </div>

                                                          <div class="mb-3">
                                                              <input type="text" class="form-control" name="plancha_grabado_numero" id="" aria-describedby="helpId" placeholder="Num." value="{{ $pintura->dimensiones->first()->plancha_grabado_numero }}">
                                                          </div>

                                                      </div>
                                                  </div>

                                                  <div class="col-4"> Marco/Elemento
                                                      <div class="row">
                                                          <div class="mb-3">
                                                              <input type="text" class="form-control" name="marco_alto" id="" aria-describedby="helpId" placeholder="Alto" value="{{ $pintura->dimensiones->first()->marco_alto }}">
                                                          </div>

                                                          <div class="mb-3">
                                                              <input type="text" class="form-control" name="marco_ancho" id="" aria-describedby="helpId" placeholder="Ancho" value="{{ $pintura->dimensiones->first()->marco_ancho }}">
                                                          </div>

                                                          <div class="mb-3">
                                                              <input type="text" class="form-control" name="marco_profundidad" id="" aria-describedby="helpId" placeholder="Prof." value="{{ $pintura->dimensiones->first()->marco_profundidad }}">
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
                                              <input class="form-check-input" type="radio" name="estado_conservacion" id="" value="bueno" @if($pintura->estado_conservacion === 'bueno') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Bueno
                                              </label>
                                          </div>

                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="estado_conservacion" id="" value="regular" @if($pintura->estado_conservacion === 'regular') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Regular
                                              </label>
                                          </div>

                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="estado_conservacion" id="" value="malo" @if($pintura->estado_conservacion === 'malo') checked @endif>
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
                                              <input class="form-check-input" type="radio" name="estado_integridad" id="" value="completo" @if($pintura->estado_integridad === 'completo') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Completo
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="estado_integridad" id="" value="incompleto" @if($pintura->estado_integridad === 'incompleto') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Incompleto
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="estado_integridad" id="" value="unido" @if($pintura->estado_integridad === 'unido') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Unido
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="estado_integridad" id="" value="fragmentado" @if($pintura->estado_integridad === 'fragmentado') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Fragmentado
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input class="form-check-input" type="radio" name="estado_integridad" id="" value="agregado" @if($pintura->estado_integridad === 'agregado') checked @endif>
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
                                                      <input type="text" class="form-control" name="forma_ingreso" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->forma_ingreso }}">
                                                  </div>
                                              </div>

                                              <div class="col-4">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Valor USD</label>
                                                      <input type="number" class="form-control" name="valor" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->valor }}">
                                                  </div>
                                              </div>
                                              <div class="col-4">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Avalúo</label>
                                                      <input type="number" class="form-control" name="avaluo" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->avaluo }}">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Fecha Doc. Ingreso</label>
                                                      <input type="date" class="form-control" name="fecha_doc_ingreso" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->fecha_doc_ingreso }}">
                                                  </div>
                                              </div>
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Fecha registro</label>
                                                      <input type="date" class="form-control" name="fecha_registro" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->fecha_registro }}">
                                                  </div>
                                              </div>
                                          </div>


                                          <div class="mb-3">
                                              <label for="" class="form-label">Observaciones</label>
                                              <input type="text" class="form-control" name="observaciones" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->observaciones }}">
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>




                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Editar</button>
                  </div>
              </form>
          </div>
      </div>
  </div>




  <!-- Modal Mostrar-->
  <div class="modal fade modal-xl" id="show{{$pintura->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Información de la pintura</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <!--Formulario-->
              <form method="post" action="{{route('pinturas.show', $pintura->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('POST')
                  <div class="modal-body">
                      <div class="container">
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
                                                      <input disabled type="text" class="form-control" name="codigo" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->codigo}}">
                                                  </div>
                                              </div>
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Otros Códigos</label>
                                                      <input disabled type="text" class="form-control" name="codigo_alternativo" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->codigo_alternativo}}">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Nombre</label>
                                                      <input disabled type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->nombre}}">
                                                  </div>
                                              </div>
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Siglo/Año</label>
                                                      <input disabled type="text" class="form-control" name="siglo_año" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->siglo_año}}">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="firmado_atribuido_documento" id="" value="firmado" @if($pintura->firmado_atribuido_documento === 'firmado') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Firmado
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="firmado_atribuido_documento" id="" value="atribuido" @if($pintura->firmado_atribuido_documento === 'atribuido') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Atribuido
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="firmado_atribuido_documento" id="" value="documento" @if($pintura->firmado_atribuido_documento === 'documento') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Documento
                                              </label>
                                          </div>

                                          <div class="mb-3">
                                              <label for="" class="form-label">Ubicación de la firma</label>
                                              <input disabled type="text" class="form-control" name="ubicacion_firma" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ubicacion_firma}}">
                                          </div>


                                          <div class="mb-3">
                                              <label for="" class="form-label">Autor</label>
                                              <select disabled class="form-select form-select-md" name="id_autor" id="">
                                                  @foreach ($autores as $autor)
                                                  <option value="{{$autor->id}}" @if ($autor->id === $pintura->autores->id) selected @endif> {{$autor->nombres ." ". $autor->apellidos}}</option>
                                                  @endforeach
                                              </select>
                                          </div>

                                          <div class="row">
                                              <div class="col-6">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Técnica</label>
                                                      <input disabled type="text" class="form-control" name="tecnica" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->tecnica}}">
                                                  </div>
                                              </div>
                                              <div class="col-6">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Soporte</label>
                                                      <input disabled type="text" class="form-control" name="soporte" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->soporte}}">
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
                                              <input disabled type="file" accept="image/*" class="form-control" name="ruta_imagen" id="imagen_seleccionada" placeholder="" aria-describedby="fileHelpId">
                                              <div id="fileHelpId" class="form-text">
                                                  <img src="/images/{{$pintura->ruta_imagen}}" id="preview" style="max-height: 300px; max-width: 300px;">
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
                                                          <input disabled type="text" class="form-control" name="alto_obra" id="" aria-describedby="helpId" placeholder="Alto" value="{{ $pintura->dimensiones->first()->alto_obra }}">
                                                      </div>

                                                      <div class="mb-3">
                                                          <input disabled type="text" class="form-control" name="ancho_obra" id="" aria-describedby="helpId" placeholder="Ancho" value="{{ $pintura->dimensiones->first()->ancho_obra }}">
                                                      </div>

                                                      <div class="mb-3">
                                                          <input disabled type="text" class="form-control" name="profundidad_obra" id="" aria-describedby="helpId" placeholder="Prof." value="{{ $pintura->dimensiones->first()->profundidad_obra }}">
                                                      </div>

                                                      <div class="mb-3">
                                                          <input disabled type="text" class="form-control" name="diametro_mayor_obra" id="" aria-describedby="helpId" placeholder="D.Mayor" value="{{ $pintura->dimensiones->first()->diametro_mayor_obra }}">
                                                      </div>

                                                      <div class="mb-3">
                                                          <input disabled type="text" class="form-control" name="diametro_menor_obra" id="" aria-describedby="helpId" placeholder="D.Menor" value="{{ $pintura->dimensiones->first()->diametro_menor_obra }}">
                                                      </div>
                                                  </div>


                                                  <div class="col-4"> Plancha Grabado
                                                      <div class="row">
                                                          <div class="mb-3">
                                                              <input disabled type="text" class="form-control" name="plancha_grabado_alto" id="" aria-describedby="helpId" placeholder="Alto" value="{{ $pintura->dimensiones->first()->plancha_grabado_alto }}">
                                                          </div>

                                                          <div class="mb-3">
                                                              <input disabled type="text" class="form-control" name="plancha_grabado_ancho" id="" aria-describedby="helpId" placeholder="Ancho" value="{{ $pintura->dimensiones->first()->plancha_gradado_ancho }}">
                                                          </div>

                                                          <div class="mb-3">
                                                              <input disabled type="text" class="form-control" name="plancha_grabado_numero" id="" aria-describedby="helpId" placeholder="Num." value="{{ $pintura->dimensiones->first()->plancha_grabado_numero }}">
                                                          </div>

                                                      </div>
                                                  </div>

                                                  <div class="col-4"> Marco/Elemento
                                                      <div class="row">
                                                          <div class="mb-3">
                                                              <input disabled type="text" class="form-control" name="marco_alto" id="" aria-describedby="helpId" placeholder="Alto" value="{{ $pintura->dimensiones->first()->marco_alto }}">
                                                          </div>

                                                          <div class="mb-3">
                                                              <input disabled type="text" class="form-control" name="marco_ancho" id="" aria-describedby="helpId" placeholder="Ancho" value="{{ $pintura->dimensiones->first()->marco_ancho }}">
                                                          </div>

                                                          <div class="mb-3">
                                                              <input disabled type="text" class="form-control" name="marco_profundidad" id="" aria-describedby="helpId" placeholder="Prof." value="{{ $pintura->dimensiones->first()->marco_profundidad }}">
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
                                              <input disabled class="form-check-input" type="radio" name="estado_conservacion" id="" value="bueno" @if($pintura->estado_conservacion === 'bueno') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Bueno
                                              </label>
                                          </div>

                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="estado_conservacion" id="" value="regular" @if($pintura->estado_conservacion === 'regular') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Regular
                                              </label>
                                          </div>

                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="estado_conservacion" id="" value="malo" @if($pintura->estado_conservacion === 'malo') checked @endif>
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
                                              <input disabled class="form-check-input" type="radio" name="estado_integridad" id="" value="completo" @if($pintura->estado_integridad === 'completo') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Completo
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="estado_integridad" id="" value="incompleto" @if($pintura->estado_integridad === 'incompleto') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Incompleto
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="estado_integridad" id="" value="unido" @if($pintura->estado_integridad === 'unido') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Unido
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="estado_integridad" id="" value="fragmentado" @if($pintura->estado_integridad === 'fragmentado') checked @endif>
                                              <label class="form-check-label" for="">
                                                  Fragmentado
                                              </label>
                                          </div>
                                          <div class="form-check">
                                              <input disabled class="form-check-input" type="radio" name="estado_integridad" id="" value="agregado" @if($pintura->estado_integridad === 'agregado') checked @endif>
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
                                                      <input disabled type="text" class="form-control" name="forma_ingreso" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->forma_ingreso }}">
                                                  </div>
                                              </div>

                                              <div class="col-4">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Valor USD</label>
                                                      <input disabled type="number" class="form-control" name="valor" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->valor }}">
                                                  </div>
                                              </div>
                                              <div class="col-4">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Avalúo</label>
                                                      <input disabled type="number" class="form-control" name="avaluo" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->avaluo }}">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Fecha Doc. Ingreso</label>
                                                      <input disabled type="date" class="form-control" name="fecha_doc_ingreso" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->fecha_doc_ingreso }}">
                                                  </div>
                                              </div>
                                              <div class="col">
                                                  <div class="mb-3">
                                                      <label for="" class="form-label">Fecha registro</label>
                                                      <input disabled type="date" class="form-control" name="fecha_registro" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->fecha_registro }}">
                                                  </div>
                                              </div>
                                          </div>


                                          <div class="mb-3">
                                              <label for="" class="form-label">Observaciones</label>
                                              <input disabled type="text" class="form-control" name="observaciones" id="" aria-describedby="helpId" placeholder="" value="{{ $pintura->ingresos->first()->observaciones }}">
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>


                      </div>


                  </div>


              </form>


              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal Eliminar-->
  <div class="modal fade" id="delete{{$pintura->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Autor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!--Formulario-->
        <form method="post" action="{{route('pinturas.destroy', $pintura->id)}}">
            @csrf  
            @method('DELETE')
            <div class="modal-body">
                Estas seguro de eliminar la pintura <strong>{{$pintura->nombre}}?</strong>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
            </div>
        </form>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
      $(document).ready(function(e) {
          $('#imagen').change(function() {
              let reader = new FileReader();
              reader.onload = (e) => {
                  $('#imagenSeleccionada').attr('src', e.target.result);
              }
              reader.readAsDataURL(this.files[0]);
          });
      });
  </script>