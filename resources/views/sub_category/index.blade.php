@extends('layouts.main')
@section('content')
    <div class="products_container">
        <div class="items_title">
            <h1>{{ $sub_category->title }}</h1>
        </div>
        <div class="content_line">
            <div class="filter">
                @include('components.filter')
            </div>
            <div class="products_items">
                @foreach ($products as $product)
                    <a href="{{ route('product.show', $product->id) }}">
                        <div class="product_container">
                            <div class="product_image">
                                <img src="{{ $product->image }}">
                            </div>
                            <div class="product_text">
                                <div class="product_title">
                                    <h2>{{ $product->title }}</h2>
                                </div>
                                <div class="product_description">
                                    {{ $product->description }}
                                </div>
                                <div class="product_checkboks">
                                    <div class="product_checkboks_line">
                                        <input type="checkbox" class="checkbox">
                                        <div>
                                            <label>В сравнение</label>
                                        </div>
                                    </div>
                                    <div class="product_checkboks_line">
                                        <input type="checkbox" class="checkbox">
                                        <div>
                                            <label>В избранное</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product_price">
                                <div class="product_coast">
                                    <span>{{ $product->price }}</span> Руб
                                </div>
                                <div class="product_old_coast">
                                    <strike>3200</strike> Руб
                                </div>
                                <div class="add_to_basket">
                                    <div>
                                        <img src="img/cart-icon2.svg">
                                    </div>
                                    <div>
                                        Заказать
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
