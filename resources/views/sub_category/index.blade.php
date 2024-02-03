@extends('layouts.main')
@section('content')
@foreach ($products as $product)
<a href="{{route('product.show', $product->id)}}">
    <div class="category_container">
        <div class="category_image">
            <img src="{{$product->image}}">
        </div>
        <div class="category_title">
            {{$product->title}}
        </div>
    </div>
</a>
@endforeach
@endsection
