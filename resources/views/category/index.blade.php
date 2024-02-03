@extends('layouts.main')
@section('content')
@foreach ($sub_categories as $sub_category)
    <div class="category_container">
        <a href="{{route('sub_category.index', $sub_category->id)}}">
        <div class="category_image">
            <img src="{{$sub_category->image}}">
        </div>
        <div class="category_title">
            {{$sub_category->title}}
        </div>
    </a>
    </div>
@endforeach
@endsection
