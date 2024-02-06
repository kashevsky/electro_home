@extends('layouts.main')
@section('content')
    <div class="sub_categories_container">
        <div class="items_title">
            <h1>{{ $category->title }}</h1>
        </div>
        <div class="sub_categories">
            @foreach ($sub_categories as $sub_category)
                <div class="sub_category_container">
                    <a href="{{ route('sub_category.index', $sub_category->id) }}">
                        <div class="category_image">
                            <img src="{{ $sub_category->image }}">
                        </div>
                        <div class="category_title">
                            {{ $sub_category->title }}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
