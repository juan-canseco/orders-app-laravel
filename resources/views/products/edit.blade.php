@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800"> Editar Producto </h1>
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

<form class="form" method="POST" action="/products/update/{{$product->id}}">

    @csrf
    <div class="form-group">
        <label for="name" class="form-label"> Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
    </div>

    <div class="form-group">
        <label for="selectedCategory" class="my-1 mr-2">Categoría</label>
        <select id="selectedCategory" class="custom-select my-1 mr-sm02" name="category">
            <option value="a">Selecciona una Categoría </option>
            @foreach ($categories as $category)
            @if ($product->category_id === $category->id)
            <option value="{{$category->id}}" selected>{{$category->name}}</option>
            @else
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="selectedSupplier" class="my-1 mr-2">Proveedor</label>
        <select id="selectedSupplier" class="custom-select my-1 mr-sm02" name="supplier">
            <option value="a">Selecciona un Proveedor </option>
            @foreach ($suppliers as $supplier)
            @if ($product->provider_id === $supplier->id)
            <option value="{{$supplier->id}}" selected>{{$supplier->names . ' ' . $supplier->surnames . ' - ' . $supplier->company}}</option>
            @else
            <option value="{{$supplier->id}}">{{$supplier->names . ' ' . $supplier->surnames . ' - ' . $supplier->company}}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="price" class="form-label"> Precio</label>
        <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
    </div>


    <div class="form-group">
        <label for="quantity" class="form-label"> Cantidad </label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
    </div>
    <hr>

    <button type="submit" class="btn btn-block btn-info bg-gradient-primary"> Guardar </button>

</form>

@endsection
