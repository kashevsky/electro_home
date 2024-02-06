@extends('layouts.main')
@section('content')
<div class="products_container">
<div class="items_title">
    <h1>{{$sub_category->title}}</h1>
</div>
<div class="content_line">
    <div class="filter">
        @include('components.filter')
    </div>
<div class="products_items">
@foreach ($products as $product)
<a href="{{route('product.show', $product->id)}}">
    <div class="product_container">
        <div class="category_image">
            <img src="{{$product->image}}">
        </div>
        <div class="category_title">
            {{$product->title}}
        </div>
    </div>
</a>
@endforeach
</div>
</div>
</div>
@endsection
