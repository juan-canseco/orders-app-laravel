@if (Auth::user()->getRole()->name === 'admin')
<div class="container">
    <a href="/users/{{$user->id}}" class="btn btn-info btn-circle">
        <i class="fas fa-info-circle"></i>
      </a>
      <a href="/users/edit/{{$user->id}}" class="btn btn-warning btn-circle">
        <i class="fas fa-edit"></i>
      </a>
      <a href="#" data-id="{{$user->id}}" data-toggle="modal" data-target="#confirm-delete-modal" class="btn btn-danger btn-circle">
        <i class="fas fa-trash"></i>
      </a>
</div>
@endif
