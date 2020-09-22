@extends('layouts.app')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Crear Categoria</h1>
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
<form class="form" method="POST" action="/categories/store">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"/>
    </div>
    <hr />
    <button type="submit" class="btn btn-block btn-info bg-gradient-primary">Guardar</button>

</form>

@endsection

