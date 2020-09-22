@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800"> Detalles Proveedor </h1>

<hr />

<form class="form">
    <div class="form-group">

        <label for="names" class="form-label"> Nombre(s)</label>
        <input type="text" class="form-control" id="names" name="names" value="{{$supplier->names}}" readonly>
    </div>

    <div class="form-group">

        <label for="surnames" class="form-label"> Apellido(s) </label>
        <input type="text" class="form-control" id="surnames" name="surnames" value="{{$supplier->surnames}}" readonly>
    </div>

    <div class="form-group">
        <label for="company" class="form-label"> Compañía </label>
        <input type="text" class="form-control" id="company" name="company" value="{{$supplier->company}}" readonly>
    </div>

    <div class="form-group">
        <label for="phone" class="form-label"> Teléfono Celular </label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{$supplier->cell_phone}}" readonly>
    </div>

    <hr>

    <button class="btn btn-block btn-info bg-gradient-primary" disabled> Detalles </button>

</form>

@endsection
