@extends('layouts.main')
@section('content')
<div class="product_container">
    <img src="{{$product->image}}">
    <h2>{{$product->title}}</h2>
</div>
@endsection
