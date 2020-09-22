@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif



@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-block">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>{{$error}}</strong>
</div>
@endforeach
@endif




<h1 class="h3 mb-4 text-gray-800">Crear Pedido</h1>

<hr>

<div class="row">

 <!-- POS -->
 <div class="col-xl-8 col-lg-7">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Pedido</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form class="form-inline" method="POST" action="/orders/addProductToCart" id="add-product-form">
        @csrf
        <label class="my-1 mr-2" for="selectedProduct">Producto</label>
        
        <select class="custom-select my-1 mr-sm-2" id="selected-product" name="productId">
            <option selected value="-1"> Seleccionar Producto...</option>
            @foreach ($products as $product)
            <option value="{{$product->id}}"> {{$product->name}} </option>
            @endforeach
        </select>

        <label class="sr-only" for="quantity"> Cantidad</label>
        <input type="number" class="form-control my-1 mr-sm-2" id="product-quantity" name="quantity" placeholder="Cantidad">
        <button id="add-button" class="btn btn-primary my-1">Agregar Producto</button>
      </form>

      <br>

    <div class="table-responsive">
      <table class="table table" width="100%" cellspacing="0">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Total</th>
                  <th>Eliminar</th>
              </tr>
          </thead>

          <tbody id="cart-body">
              @if ($cart)
              @foreach($cart as $item)
              <tr>
                  <td> {{$item['id']}} </td>
                  <td> {{$item['name']}} </td>
                  <td>
                      ${{number_format($item['price'],2)}}
                  </td>
                  <td> {{$item['quantity']}} </td>
                  <td> ${{number_format($item['total'],2)}} </td>
                  <td>
                      <a href="#" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#change-quantity-modal" data-id="{{$item['id']}}" data-quantity="{{$item['quantity']}}" >
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" data-id="{{$item['id']}}" data-toggle="modal" data-target="#confirm-delete-modal" class="btn btn-danger btn-circle">
                          <i class="fas fa-trash"></i>
                        </a>
                  </td>
              </tr>
              @endforeach
              @endif
          </tbody>

          <tfoot>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><strong>Total</strong></td>
              <td id="total-label">${{number_format($total, 2)}}</td>
          </tr>

          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><strong>Cantidad</strong></td>
              <td id="quantity-label">{{$quantity}}</td>
          </tr>

      
          </tfoot>
      </table>
    </div>

    </div>

  </div>
</div>


       <!-- Confirm Order -->
       <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Confirmar Pedido</h6>
            
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <form class="form" method="POST" action="/orders/create">
              @csrf
              <div class="form-group">
                <label for="selectedCustomer" class="my-1 mr-2">Cliente</label>
                <select id="selectedCustomer" class="custom-select my-1 mr-sm02" name="customerId">
                  <option selected value="a"> Seleccionar Cliente...</option>
                  @foreach ($customers as $customer)
                  <option value="{{$customer->id}}"> {{$customer->names . ' ' . $customer->surnames}} </option>
                  @endforeach
                </select>    
              </div>
              <button type="submit" class="btn btn-block btn-info bg-gradient-primary"> Confirmar Pedido </button>
            </form>
            <hr>
            <button type="button" data-toggle="modal" data-target="#confirm-cancel-order-modal" class="btn btn-block btn-danger"> Cancelar Pedido </button>
          </div>
        </div>
      </div>
</div>


<!-- Confirm cancel Order Modal -->

<div class="modal fade" id="confirm-cancel-order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">x</span>
              </button>
          </div>
          <div class="modal-body"> ¿Estás seguro que deseas cancelar el pedido?</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <a type="button" href="/orders/cancel" class="btn btn-primary confirm-delete">Confirmar</a>
          </div>
      </div>
  </div>
</div>


<!-- Delete Prdouct Modal -->
<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¿Estás seguro que quieres quitar el Producto?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-primary delete-product" type="button">Confirmar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Update Product Quantity -->
  <div class="modal fade" id="change-quantity-modal" tabindex="-1" role="dialog" aria-labelledby="changeQuantityModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changeQuantityModalLabel">Cambiar Cantidad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="quantity" class="col-form-label">Cantidad</label>
              <input type="number" class="form-control" name="quantity" id="quantity-input">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="change-quantity-button" class="btn btn-primary">Cambiar cantidad</button>
        </div>
      </div>
      </div>
  </div>
@endsection
@section('scripts')
<script src="{{ asset('js/cartUtils.js') }}" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        CartUtils.init();
    });
</script>
@endsection

