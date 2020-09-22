@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif

<h1 class="h3 mb-4 text-gray-800">Listado de Proveedores</h1>
<hr />

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <th> Nombre (s) </th>
                <th> Apellidos (s) </th>
                <th> Teléfono Celular </th>
                @if (Auth::user()->getRole()->name === 'admin')
                <th> Acciones </th>
                @endif
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{$supplier->names}} </td>
                    <td>{{$supplier->surnames}} </td>
                    <td>{{$supplier->cell_phone}} </td>
                    <td>
                        @include('suppliers.actions')
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$suppliers->links()}}
    </div>
</div>

<!-- Suppliers delete modal -->
<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body"> ¿Estás seguro que deseas eliminar al Proveedor seleccionado?</div>
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
            deleteLink.href = `/suppliers/delete/${id}`
        });
    });
</script>
@endsection
