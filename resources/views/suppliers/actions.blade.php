@if (Auth::user()->getRole()->name === 'admin')
    <div class="container">
        <a href="/suppliers/{{$supplier->id}}" class="btn btn-info btn-circle">
            <i class="fas fa-info-circle"></i>
        </a>
        <a href="/suppliers/edit/{{$supplier->id}}" class="btn btn-warning btn-circle">
            <i class="fas fa-edit"></i>
        </a>

        <a href="#" data-id="{{$supplier->id}}" data-toggle="modal" data-target="#confirm-delete-modal" class="btn btn-danger btn-circle">
            <i class="fas fa-trash"></i>
        </a>
    </div>
@else
<div class="container">
    <a href="/suppliers/{{$supplier->id}}" class="btn btn-info btn-circle">
        <i class="fas fa-info-circle"></i>
    </a>
</div>
@endif
