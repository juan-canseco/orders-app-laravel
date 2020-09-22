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

<form class="form" method="POST" action="/suppliers/update/{{$supplier->id}}">
    @csrf
    <div class="form-group">

        <label for="names" class="form-label"> Nombre(s)</label>
        <input type="text" class="form-control" id="names" name="names" value="{{$names = old('names') !== NULL? old('names') : $supplier->names}}">
    </div>

    <div class="form-group">

        <label for="surnames" class="form-label"> Apellido(s) </label>
        <input type="text" class="form-control" id="surnames" name="surnames" value="{{$surnames = old('surnames') !== NULL? old('surnames') : $supplier->surnames}}">
    </div>

    <div class="form-group">
        <label for="company" class="form-label"> Compañía </label>
        <input type="text" class="form-control" id="company" name="company" value="{{$company = old('company') !== NULL? old('company') : $supplier->company}}">
    </div>

    <div class="form-group">

        <label for="phone" class="form-label"> Teléfono Celular </label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{$phone = old('phone') !== NULL? old('phone') : $supplier->cell_phone}}">
    </div>

    <hr>

    <button type="submit" class="btn btn-block btn-info bg-gradient-primary"> Editar </button>

</form>

@endsection
