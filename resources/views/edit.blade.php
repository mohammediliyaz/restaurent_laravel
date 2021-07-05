@extends('layout')

@section('content')

<h2> Edit Restauren  here</h2>

<div class='col-sm-6'>
<form method="POST" action="">
@csrf
  <div class="form-group">
  <input type="hidden" value="{{$data->id}} ">
  <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ $data->name }}" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" value="{{ $data->email }}"  placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Address</label>
    <input type="text" name="address" class="form-control"  value="{{ $data->address }}" placeholder="Enter address">

  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop