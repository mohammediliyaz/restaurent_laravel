@extends('layout')

@section('content')
<h2>Restaurent List Page</h2>
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
 {{ Session::get('status')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th>Operations</th>
    </tr>
  </thead>

  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{ $item->id }}</th>
      <td>{{ $item->Name }}</td>
      <td>{{ $item->Email }}</td>
      <td>{{ $item->Address }}</td>
      <td>
      <a href="/delete/{{ $item->id }}"><i class="fas fa-trash"></i>delete </a>
      <a href="/edit/{{ $item->id }}"><i class="fas fa-edit"></i>edit </a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
@stop

