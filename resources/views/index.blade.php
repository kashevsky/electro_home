@extends('layouts.main')
@section('content')
@foreach ($categories as $category)
<a href="{{route('category.index', $category->id)}}">
<div class="category_container">
    <div class="category_image">
        <img src="{{$category->image}}">
    </div>
    <div class="category_title">
        {{$category->title}}
    </div>
</div>
</a>
@endforeach
@endsection
