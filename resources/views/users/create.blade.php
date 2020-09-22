@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Crear Usuario</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
</div>
@endif
<hr>
<form class="form" method="POST" action="/users/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="names" class="form-label">Nombre(s)</label>
        <input type="text" class="form-control" id="names" name="names" value="{{old('names')}}"/>
    </div>
    <div class="form-group">
        <label for="surnames" class="form-label">Apellido(s)</label>
        <input type="text" class="form-control" name="surnames" id="surnames" value="{{old('surnames')}}" />
    </div>
    <div class="form-group">
        <label for="selectedRole" class="my-1 mr-2">Rol</label>
        <select id="selectedRole" class="custom-select my-1 mr-sm02" name="role">
            <option value="0">Selecciona un Rol</option>
            @foreach ($roles as $role)
            @if (old('role') === $role->name)
            <option value="{{$role->name}}" selected>{{$role->description}}</option>
            @else
            <option value="{{$role->name}}">{{$role->description}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"/>
    </div>
    <div class="form-group">
        <label for="username" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" />
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" type="password" class="form-control" id="password" name="password" />
    </div>

    <hr>

    <img class="img-thumbnail" src="https://placehold.it/80x80" width="100px" height="100px">

    <div class="custom-file">
        <input type="file" id="photo" name="photo" accept="image/*" class="custom-file-input" lang="es" value="{{old('photo')}}">
        <label for="photo" class="custom-file-label">Foto perfil</label>
    </div>

    <hr>

    <button type="submit" class="btn btn-block btn-info bg-gradient-primary">Guardar</button>

</form>


@endsection


@section('scripts')
<script src="{{ asset('js/uploadPhotoUtils.js') }}" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", function(e) {
        PhotoUtils.init();
    });

</script>
@endsection
