@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800"> Crear Cliente </h1>
<hr>
<form class="form">
    <div class="form-group">
        <label for="names" class="form-label"> Nombre(s)</label>
        <input type="text" class="form-control" name="names" id="names" value="{{$customer->names}}" readonly>
    </div>

    <div class="form-group">
        <label for="surnames" class="form-label"> Apellido(s)</label>
        <input type="text" class="form-control" name="surnames" id="surnames" value="{{$customer->surnames}}" readonly>
    </div>

    <div class="form-group">
        <label for="rfc" class="form-label"> RFC </label>
        <input type="text" class="form-control" id="rfc" name="rfc" value="{{$customer->rfc}}" readonly>
    </div>

    <button type="button" class="btn btn-block btn-info bg-gradient-primary" disabled>Detalles</button>

</form>
@endsection