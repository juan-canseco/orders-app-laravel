@if (Auth::user()->getRole()->name === 'admin')
<div class="container">

    <a href="/customers/{{$customer->id}}" class="btn btn-info">
        <i class="fas fa-info-circle"></i>
    </a>

    <a href="/customers/edit/{{$customer->id}}" class="btn btn-warning">
        <i class="fas fa-edit"></i>
    </a>

    <a href="#" data-id="{{$customer->id}}" data-toggle="modal" data-target="#confirm-delete-modal" class="btn btn-danger">
        <i class="fas fa-trash"></i>
    </a>

</div>
@else 
<div class="container">
    <a href="/customers/{{$customer->id}}" class="btn btn-info btn-circle">
        <i class="fas fa-info-circle"></i>
    </a>
</div>
@endif