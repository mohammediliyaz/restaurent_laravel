

@extends('layout')

@section('content')
<h2>show home pagecontent</h2>

<div class='container'>
<div style="display:grid; grid-template-columns:auto auto auto; grid-row-gap:20px;">
@foreach($data as $item)

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://media.istockphoto.com/photos/tasty-pepperoni-pizza-and-cooking-ingredients-tomatoes-basil-on-black-picture-id1083487948?k=6&m=1083487948&s=612x612&w=0&h=lK-mtDHXA4aQecZlU-KJuAlN9Yjgn3vmV2zz5MMN7e4=" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$item['field_pizza_title'] }}</h5>
    <p class="card-text">{{ $item['field_ingredients']}}</p>
    <a href="#" class="btn btn-primary">More info</a>
  </div>
</div>
@endforeach
</div>
</div>
@stop