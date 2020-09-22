@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif

<h1 class="h3 mb-4 text-gray-800">Listado de Pedidos</h1>
<hr />

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th> Codigo </th>
                <th> Cliente </th>
                <th> Cantidad </th>
                <th> Total </th>
                <th> Acciones </th>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td> {{$order->id}} </td>
                    <td> {{$order->names . ' ' . $order->surnames}} </td>
                    <td> {{$order->quantity}} </td>
                    <td> {{$order->total}} </td>
                    <td>
                        @include('orders.actions')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    </div>
</div>

<!-- Orders delete modal -->
<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body"> ¿Estás seguro que deseas eliminar el Pedido seleccionado?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-primary confirm-delete">Confirmar</a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        $('#confirm-delete-modal').on('show.bs.modal', function(e) {
            let id = e.relatedTarget.dataset['id'];
            let deleteLink = document.getElementsByClassName('confirm-delete')[0];
            deleteLink.href = `/orders/delete/${id}`;
        });
    });
</script>
@endsection
