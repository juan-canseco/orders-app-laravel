@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Detalles Usuario</h1>
<hr>
<form class="form">
    <div class="form-group">
        <label for="names" class="form-label">Nombre(s)</label>
        <input type="text" class="form-control" id="names" name="names" value="{{$user->names}}" readonly>
    </div>
    <div class="form-group">
        <label for="surnames" class="form-label">Apellido(s)</label>
        <input type="text" class="form-control" name="surnames" id="surnames" value="{{$user->surnames}}" readonly>
    </div>
    <div class="form-group">
        <label for="selectedRole" class="my-1 mr-2">Rol</label>
        <select id="selectedRole" class="custom-select my-1 mr-sm02" name="role" disabled>
            <option value="0">{{$user->getRole()->description}}</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
    </div>
    <div class="form-group">
        <label for="username" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" readonly>
    </div>
    <hr>
    <img class="img-thumbnail" src="/storage/{{$user->profile_picture_uri}}" width="100px" height="100px" />

    <hr>

    <button class="btn btn-block btn-info bg-gradient-primary" disabled>Detalles</button>

</form>


@endsection
