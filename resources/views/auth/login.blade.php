<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Login</title>
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">


      <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- <link href="{{asset('css/')}}" rel="stylesheet" type="text/css"> -->

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <style>
  </style>

</head>

<body class="bg-gradient-primary">

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$errors->first()}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-gray-300"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                  </div>
                  <form class="user" method="POST" action="login">
                    @csrf
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Correo">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recuérdame</label>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Iniciar sesión" />
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">¿Olvidaste la contraseña?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
