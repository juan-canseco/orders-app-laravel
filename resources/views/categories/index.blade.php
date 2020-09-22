@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{$message}}</strong>
</div>
@endif
<h1 class="h3 mb-4 text-gray-800">Listado Categorías</h1>
<hr />
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">

            <thead>
                <th> Id </th>
                <th> Nombre </th>
                @if (Auth::user()->getRole()->name === 'admin')
                <th>Acciones</th>
                @endif
            </thead>

            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    @if (Auth::user()->getRole()->name === 'admin')
                    <td>
                        @include('categories.actions')
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
            <tfoot>
              {{ $categories->links() }}
            </tfoot>
        </table>

</div>

</div>

<!-- User Delete Modal -->
<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">¿Estás seguro que deseas eliminar la Categoria seleccionada?</div>
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
            deleteLink.href = `/categories/delete/${id}`;
        });
    });
</script>
@endsection
