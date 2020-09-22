@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800"> Editar Cliente </h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{$error}} </li>
        @endforeach
    </ul>
</div>
@endif
<hr/>
<form class="form" method="POST" action="/customers/update/{{$customer->id}}">
    @csrf
    <div class="form-group">
        <label for="names" class="form-label"> Nombre(s) </label>
        <input type="text" class="form-control" id="names" name="names" value="{{$customer->names}}" />
    </div>
    <div class="form-group">
        <label for="surnames" class="form-label"> Apellido(s) </label>
        <input type="text" class="form-control" id="surnames" name="surnames" value="{{$customer->surnames}}" />
    </div>

    <div class="form-group">
        <label for="rfc" class="form-label"> RFC </label>
        <input type="text" class="form-control" id="rfc" name="rfc" value="{{$customer->rfc}}" />
    </div>

    
    <button type="submit" class="btn btn-block btn-info bg-gradient-primary"> Editar </button>
</form>


@endsection