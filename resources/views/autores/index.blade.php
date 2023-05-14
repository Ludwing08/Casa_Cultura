@extends('principal')
@section('content')
    
    <!-- Agregar categoria -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
        Nuevo autor
    </button>
    
        <div class="table-responsive">
            <br>
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Ciudad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autores as $autor)
                        <tr class="">
                            <td scope="row">{{$autor->id}}</td>
                            <td>{{$autor->nombres}}</td>
                            <td>{{$autor->apellidos}}</td>
                            <td>{{$autor->pais}}</td>
                            <td>{{$autor->provincia}}</td>
                            <td>{{$autor->ciudad}}</td>
                            <td>
                                <!--editar-->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$autor->id}}">
                                Editar
                                </button>
                                <!--eliminar-->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$autor->id}}">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        @include('autores.info')
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
        @include('autores.create')

        @endsection   
    