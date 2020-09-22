@extends('layouts.app')

@section('content')

<h1 class="h3 mb-4 text-gray-800"> Detalles Producto </h1>

<hr />

<form class="form">

    <div class="form-group">
        <label for="name" class="form-label"> Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" readonly>
    </div>

    <div class="form-group">
        <label for="selectedCategory" class="my-1 mr-2">Categoría</label>
        <select id="selectedCategory" class="custom-select my-1 mr-sm02" name="category" disabled>
            <option value="a" selected>{{$category->name}}</option>
        </select>
    </div>

    <div class="form-group">
        <label for="selectedSupplier" class="my-1 mr-2">Proveedor</label>
        <select id="selectedSupplier" class="custom-select my-1 mr-sm02" name="supplier" disabled>
            <option value="a" selected>{{$supplier->names . ' ' . $supplier->surnames . ' - ' . $supplier->company }}</option>
        </select>
    </div>

    <div class="form-group">
        <label for="price" class="form-label"> Precio</label>
        <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}" readonly>
    </div>


    <div class="form-group">
        <label for="quantity" class="form-label"> Cantidad </label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}" readonly>
    </div>
    <hr>

    <button class="btn btn-block btn-info bg-gradient-primary" disabled> Detalles </button>

</form>

@endsection
