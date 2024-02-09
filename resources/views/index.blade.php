@extends('layouts.main')
@section('content')
    <script>
        function initBaner() {
            return {
                imgs: ['/img/baner1.jpg', '/img/baner2.jpg', '/img/baner3.jpg'],
                counter: 0,
                img: '',
                init() {
                    this.img = this.imgs[0]
                    setInterval(() => {
                        this.img = this.imgs[this.counter];
                        this.counter++;
                        if (this.counter > this.imgs.length) {
                            this.counter = 0;
                            this.img = this.imgs[this.counter];
                        }
                    }, 10000);
                }
            }
        }
    </script>
    <div class="baner" x-data="initBaner()">
        <img :src="img">
    </div>
    <div class="index_container">
        <div class="sale_products_title">
            <h1>Товары на акции</h1>
        </div>
        <div class="sale_products_container">
            @foreach ($products_in_sale as $product)
                <a href="{{ route('product.show', $product->id) }}" class="a">
                    <div class="sale_product_container">
                        <center>
                            <div class="sale_product_image">
                                <img src="{{ $product->image }}">
                            </div>
                        </center>
                        <div class="sale_product_title">
                            {{ $product->title }}
                        </div>
                        <div class="sale_product_prices">
                            <div class="sale_product_price">
                                1400 Руб
                            </div>
                            <div class="sale_product_old_price">
                                <strike>1550 Руб</strike>
                            </div>
                        </div>
                        <div class="sale_product_btn">
                            <div>
                                <img src="img/cart-icon2.svg">
                            </div>
                            <div>
                                В корзину
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
