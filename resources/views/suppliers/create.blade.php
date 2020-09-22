@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800"> Crear Proveedor </h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
</div>
@endif
<hr />

<form class="form" method="POST" action="/suppliers/store">
    @csrf
    <div class="form-group">
        <label for="names" class="form-label"> Nombre(s)</label>
        <input type="text" class="form-control" id="names" name="names" value="{{old('names')}}">
    </div>

    <div class="form-group">
        <label for="surnames" class="form-label"> Apellido(s) </label>
        <input type="text" class="form-control" id="surnames" name="surnames" value="{{old('surnames')}}">
    </div>

    <div class="form-group">
        <label for="company" class="form-label"> Compañía </label>
        <input type="text" class="form-control" id="company" name="company" value="{{old('company')}}">
    </div>

    <div class="form-group">
        <label for="phone" class="form-label"> Teléfono Celular </label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{old('cell-phone')}}">
    </div>

    <hr>

    <button type="submit" class="btn btn-block btn-info bg-gradient-primary"> Guardar </button>

</form>

@endsection
