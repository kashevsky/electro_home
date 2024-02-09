@extends('layouts.main')
@section('content')
<div class="current_product_container">
    <div class="current_product_row">
        <div class="current_product_slider">
            <div class="slider">
                <div class="img">
                    <a href="{{ $product->image }}" rel="example_group" id="adpdp14">
                        <img src="{{ $product->image }}" id="dp14" style="margin-bottom: 3px;" alt="" /></a>
                </div>
                <div class="thumbs_container">
                    @foreach ($product->slides as $image)
                        <div class="thumbs">
                            <div class="it"><a style="display:none;" href="{{ $image->src }}" rel="example_group"></a>
                                <img src="{{ $image->src }}" onclick='setBigImage(this);' alt="" />
                            </div>
                            <div class="clr"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="current_product_about">
            <div class="current_product_title">
                <h1>{{$product->title}}</h1>
            </div>
            <div class="current_product_description">
                {{$product->description}}
            </div>
            <div class="current_product_coast">
                <span>{{$product->price}}</span> Руб
                <strike>2100 Руб</strike>
            </div>
            <div class="current_product_actions">
                <div class="qty">
                    <div>
                        Количество:
                    </div>
                    <div class="qty_counter">
                        <div class="minus">
                            -
                        </div>
                        <div class="value">
                            1
                        </div>
                        <div class="plus">
                            +
                        </div>
                    </div>
                    {{-- <div class="promocode">
                        <input type="text" placeholder="Промокод">
                    </div> --}}
                </div>
                <div class="current_product_buttons">
                    <div class="current_product_cart">
                        <div class="h">
                            <img src="img/cart-icon2.svg">
                        </div>
                        <div class="h">
                            В корзину
                        </div>
                    </div>
                    <div class="current_product_quick">
                        <div class="h">
                            <img src="img/qck.png">
                        </div>
                        <div class="h">
                        Быстрый заказ
                        </div>
                    </div>
                </div>
                <div class="additionally">
                    <div class="additionally_item">
                        Произволитель: <span>Example</span>
                    </div>
                    <div class="additionally_item">
                        Импортер: <span>Example</span>
                    </div>
                    <div class="additionally_item">
                        Сервисные центры: <span>Example</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="haracteristics">
        <div class="haracteristics_title">
            <p>Характеристики</p>
        </div>
        <table class="table">
            @foreach ($product->haracteristics as $haracteristic)
                <tr class="tr">
                    <td>{{ $haracteristic->parametr }}</td>
                    <td>{{ $haracteristic->value }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
