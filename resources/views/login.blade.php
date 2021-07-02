@extends('layout')

@section('content')
<div class='col-sm-6'>
<h2>Restaurent Login page</h2>
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{ Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<form method="POST" action="login">
@csrf
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control"   placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control"   placeholder="Enter password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

@stop