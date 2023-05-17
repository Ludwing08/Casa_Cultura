  <!-- Modal Edit Nueva Categoria -->
  <div class="modal fade" id="edit{{$pintura->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Pintura</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <!--Formulario-->
              <form method="post" action="{{route('pinturas.update', $pintura->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">

                      <!--Nombre-->
                      <label class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->nombre}}">

                      <!--Siglo_año-->
                      <label class="form-label">Siglo / año</label>
                      <input type="text" class="form-control" name="siglo_año" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->siglo_año}}">

                      <!-- Imagen  -->
                      <div class="grid grid-cols-1 mt-5 mb-7">
                          <img src="/images/{{$pintura->ruta_imagen}}" id="imagenSeleccionada" style="max-height: 300px;">
                      </div>
                      <div class="mb-3">
                          <label for="formFile" class="form-label">Default file input example</label>
                          <input class="form-control" type="file" id="imagen" name="ruta_imagen">
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
  <div class="modal fade" id="show{{$pintura->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <div class="mb-3">
                          <!--Código-->
                          <label class="form-label">Código</label>
                          <input type="text" disabled class="form-control" name="código" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->codigo}}">

                          <!--Nombre-->
                          <label class="form-label">Nombre</label>
                          <input type="text" disabled class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->nombre}}">

                          <!--Siglo_año-->
                          <label class="form-label">Siglo / año</label>
                          <input type="text" disabled class="form-control" name="siglo_año" id="" aria-describedby="helpId" placeholder="" value="{{$pintura->siglo_año}}">

                          <!-- Imagen  -->
                          <div class="grid grid-cols-1 mt-5 mb-7">
                              <img src="/images/{{$pintura->ruta_imagen}}" id="imagenSeleccionada" style="max-height: 300px;">
                          </div>


                      </div>
                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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