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
                    }, 4000);
                }
            }
        }
    </script>
    <div class="baner" x-data="initBaner()">
        <img :src="img" x-transition>
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
                            <div class="sale_img">
                                <img src="img/sale2.png" style="width: 25px">
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
        <div class="sub_product_long_text">
            <p>Бытовая техника - это различные приборы, которые человек использует в быту. А быт - это все, что связано с жизнью человека и его основными потребностями ( пища, отдых, личная гигиена и так далее ).</p>
            <br>
            <p>Бытовая техника призвана облегчить человеку жизнь, освободить его от нудной, тяжелой, монотонной работы и домашних обязанностей и не только домашних. Бутовая техника используется и на работе, и в учебе. Полностью она человека не заменяет, но ежедневные обязанности по дому упрощает, а досуг делает интереснее и разнообразнее.</p>
            <br>
            <p>Если открыть сайт любого интернет-магазина бытовой техники, то можно заметить, что всю бытовую технику условно можно разделить на группы:</p>
            <br>
            <ul>
                <li>кухонная техника ( крупная, мелкая, встраиваемая ): газовые и электроплиты, микроволновые печи, миксеры, блендеры, кухонные комбайны, овощерезки, блинницы, тостеры, мультиварки, холодильники, морозильники, электросушилки, посудомоечные машины и так далее;</li>
                <li>теле-, видео- и аудио- техника: телевизоры, плееры, и пр.;</li>
                <li>техника для уборки и ухода за одеждой: пылесосы, стиральные машины, утюги, отпариватели.</li>
            </ul>
        </div>
    </div>
@endsection
