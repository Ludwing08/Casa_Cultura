  
  <!-- Modal Edit Nueva Categoria -->
  <div class="modal fade" id="edit{{$autor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Autor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

         <!--Formulario-->
         <form method="post" action="{{route('autores.update', $autor->id)}}">
          @csrf
          @method('PUT')
          <div class="modal-body">
              <div class="mb-3">
                  <!--Nombres-->
                  <label class="form-label">Nombres</label>
                  <input type="text"
                  class="form-control" name="nombres" id="" aria-describedby="helpId" placeholder="" value="{{$autor->nombres}}">

                  <!--Apellidos-->
                  <label class="form-label">Apellidos</label>
                  <input type="text"
                  class="form-control" name="apellidos" id="" aria-describedby="helpId" placeholder="" value="{{$autor->apellidos}}">

                  <!--Pais-->
                  <label class="form-label">Pais</label>
                  <input type="text"
                  class="form-control" name="pais" id="" aria-describedby="helpId" placeholder="" value="{{$autor->pais}}">
                  
                  <!--Provincia-->
                  <label class="form-label">Provincia</label>
                  <input type="text"
                  class="form-control" name="provincia" id="" aria-describedby="helpId" placeholder="" value="{{$autor->provincia}}">

                  <!--Ciudad-->
                  <label class="form-label">Ciudad</label>
                  <input type="text"
                  class="form-control" name="ciudad" id="" aria-describedby="helpId" placeholder="" value="{{$autor->ciudad}}">

                  <!--Biografia-->
                  <label class="form-label">Biografía</label>
                  
                <textarea class="form-control" name="biografia" id="" aria-describedby="helpId" placeholder="" 
                value="{{$autor->biografia}}"></textarea>
                  
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




  
  <!-- Modal Eliminar-->
  <div class="modal fade" id="delete{{$autor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Autor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!--Formulario-->
        <form method="post" action="{{route('autores.destroy', $autor->id)}}">
            @csrf  
            @method('DELETE')
            <div class="modal-body">
                Estas seguro de eliminar el autor <strong>{{$autor->nombres}}?</strong>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
            </div>
        </form>
      </div>
    </div>
  </div>





  
  