  
  <!-- Modal Create Nuevo Autor -->
  <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Autor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!--Formulario-->
        <form method="post" action="{{route('autores.store')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">

                    <!--Nombres-->
                    <label class="form-label">Nombres</label>
                    <input type="text"
                    class="form-control" name="nombres" id="" aria-describedby="helpId" placeholder="">

                    <!--Apellidos-->
                    <label class="form-label">Apellidos</label>
                    <input type="text"
                    class="form-control" name="apellidos" id="" aria-describedby="helpId" placeholder="">

                    <!--Pais-->
                    <label class="form-label">Pais</label>
                    <input type="text"
                    class="form-control" name="pais" id="" aria-describedby="helpId" placeholder="">
                    
                    <!--Ciudad-->
                    <label class="form-label">Provincia</label>
                    <input type="text"
                    class="form-control" name="provincia" id="" aria-describedby="helpId" placeholder="">

                    <!--Provincia-->
                    <label class="form-label">Ciudad</label>
                    <input type="text"
                    class="form-control" name="ciudad" id="" aria-describedby="helpId" placeholder="">

                    <!--Biografia-->
                    <label class="form-label">Biografía</label>
                    <textarea class="form-control" name="biografia" id="" aria-describedby="helpId" placeholder="" ></textarea>
                    
                </div>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>