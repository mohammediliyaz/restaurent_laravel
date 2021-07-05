

@extends('layout')

@section('content')


<div class='container'>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>password did not match with the user {{ $user[0]->Email }} </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

</div>
@stop










