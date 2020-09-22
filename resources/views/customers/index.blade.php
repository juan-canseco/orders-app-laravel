@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success alert-black">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong> {{$message}} </strong>
</div>
@endif
<h1 class="h3 mb-4 text-gray-800"> Listado de Clientes</h1>
<hr />

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <th>RFC</th>
                <th>Nombre(s)</th>
                <th>Apellido(s) </th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach($customers as $customer) 
                <tr>
                    <td>{{$customer->rfc}}</td>
                    <td>{{$customer->names}}</td>
                    <td>{{$customer->surnames}}</td>
                    <td>
                        @include ('customers.actions')
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                {{$customers->links()}}
            </tfoot>
        </table>
    </div>
</div>

<!-- Customers delete modal --> 
<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>

            <div class="modal-body">
                ¿Estás seguro que deseas eliminar el Producto seleccionado?
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"> Cancelar</button>
                <a type="button" class="btn btn-primary confirm-delete"> Confirmar</a>
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
            deleteLink.href = `/customers/delete/${id}`;
        });
    });
</script>
@endsection