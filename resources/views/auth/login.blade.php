@extends('welcome')
  @section('content')
      
  <head>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

      <link rel="stylesheet" href="{{ asset('assets/css/estilos.css')}}">

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </head>

    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="{{ asset('assets/img/logo.png') }}"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">Inicio de Sesión</h4>
                      </div>

                      <form method="POST" action="{{route('login')}}">
                        @csrf
                        @method('post')
                        <p>Porfavor, ingresa el usuario y la contraseña</p>
      
                        <!-- Email input -->    
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example11">Usuario</label>
                          <input type="email" name="email" id="form2Example11" class="form-control"
                            placeholder="ex: carlos@gmail.com" value="{{ old('email') }}"/>
                          
                            @error('email')
                              <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Contraseña input --> 
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">Contraseña</label>
                          <input type="password" name="password" id="form2Example22" class="form-control" value="{{ old('password') }}"/>

                          @error('password')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror

                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Ingresar</button>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                          <a href=" {{ route('register')}}" class="btn btn-outline-danger">Registrarse</a>
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">"Individualmente somos una gota. Juntos somos el Mar"</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>


  @endsection