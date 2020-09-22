@if (Auth::user()->getRole()->name === 'admin')
<div class="container">
      <a href="/categories/edit/{{$category->id}}" class="btn btn-warning btn-circle">
        <i class="fas fa-edit"></i>
      </a>
      <a href="#" data-id="{{$category->id}}" data-toggle="modal" data-target="#confirm-delete-modal" class="btn btn-danger btn-circle">
        <i class="fas fa-trash"></i>
      </a>
</div>
@endif
