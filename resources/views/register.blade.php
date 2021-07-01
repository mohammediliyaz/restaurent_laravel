@extends('layout')

@section('content')
<div class='col-sm-6'>
<h2>Restaurent Register page</h2>
<form method="POST" action="register">
@csrf
  <div class="form-group">

  <label>Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control"   placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control"   placeholder="Enter password">

  </div>
  <div class="form-group">
    <label>Contact</label>
    <input type="text" name="contact" class="form-control"   placeholder="Enter contact">

  </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>

@stop