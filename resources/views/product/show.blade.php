@extends('layouts.main')
@section('content')
    <script>
        function initModal() {
            return {
                openQModal: false,
                openModal: function() {
                    this.openQModal = true;
                    document.getElementById('wr').classList.add("darken");
                    document.getElementById('modal').style.filter = 'none';
                },
                closeModal: function() {
                    this.openQModal = false;
                    document.getElementById('body').style.overflow = 'scroll';
                    document.getElementById('wr').classList.remove("darken");
                }

            }
        }
    </script>
    <script>
        function more() {
            let counter = document.getElementById('productCount').innerHTML;
            if (counter < 30) {
                document.getElementById('productCount').innerHTML++;
            }
        }

        function low() {
            let counter = document.getElementById('productCount').innerHTML
            if (counter > 1) {
                document.getElementById('productCount').innerHTML--;
            }
        }
    </script>
    <div x-data="initModal()">
    <div class="bread_crumbs">
        <div class="bread_crumbs_item">
            <a href="/">
                <div class="bread_crumbs_item_flex">
                    <div class="bread_crumbs_item_img">
                        <img src="img/home2.png">
                    </div>
                    <div class="bread_crumbs_item_text">
                        Главная
                    </div>
                </div>
            </a>
            <div class="bread_crumbs_item_arrow">
                <img src="img/ar.png">
            </div>
        </div>
        <div class="bread_crumbs_item">
            <a href="{{ route('sub_category.index', $product->subCategory->id) }}">
                <div class="bread_crumbs_item_text">
                    {{ $product->subCategory->title }}
                </div>
            </a>
            <div class="bread_crumbs_item_arrow">
                <img src="img/ar.png">
            </div>
        </div>
        <div class="bread_crumbs_item">
            <div class="bread_crumbs_item_text">
                {{ $product->title }}
            </div>
        </div>
    </div>
    <div class="current_product_container">
        <div class="current_product_row">
            <div class="current_product_slider">
                <div class="slider">
                    <div class="img">
                        <a href="{{ $first_slide->src }}" rel="example_group" id="adpdp14">
                            <img src="{{ $first_slide->src }}" id="dp14" style="margin-bottom: 3px;"
                                alt="" /></a>
                    </div>
                    <div class="thumbs_container">
                        @foreach ($slides as $image)
                            <div class="thumbs">
                                <div class="it"><a style="display:none;" href="{{ $image->src }}"
                                        rel="example_group"></a>
                                    <img src="{{ $image->src }}" onclick='setBigImage(this);' alt="" />
                                </div>
                                <div class="clr"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="current_product_checkboxes">
                    <div>
                        <input type="checkbox">
                        <label>К сравнению</label>
                    </div>
                    &nbsp
                    &nbsp
                    &nbsp
                    <div>
                        <input type="checkbox">
                        <label>В избранное</label>
                    </div>
                </div>
            </div>
            <div class="current_product_about">
                <div class="current_product_title">
                    <h1>{{ $product->title }}</h1>
                </div>
                <div class="current_product_description">
                    {!! $product->description !!}
                </div>
                <div class="current_product_coast">
                    <span>{{ $product->price }}</span> Руб
                    <strike>2100 Руб</strike>
                </div>
                <div class="current_product_actions">
                    <div class="qty">
                        <div>
                            Количество:
                        </div>
                        <div class="qty_counter">
                            <a href="javascript: void(0)">
                                <div class="minus" onclick="low()">
                                    -
                                </div>
                            </a>
                            <div class="value" id="productCount">
                                1
                            </div>
                            <a href="javascript: void(0)">
                                <div class="plus" onclick="more()">
                                    +
                                </div>
                            </a>
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
                                <a href="javascript: void(0)">
                                    <div class="h" @click="addProduct({{ $product->id }})">
                                        В корзину
                                    </div>
                                </a>
                            </div>
                            <a href="javascript: void(0)">
                                <div class="current_product_quick">
                                    <div class="h">
                                        <img src="img/qck.png">
                                    </div>
                                    <div class="h" @click="openModal()">
                                        Быстрый заказ
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div x-show="openQModal == true" class="modal" @click.outside="closeModal()">
                            <div class="modal_title">
                            Быстрый заказ
                            </div>
                            <div class="modal_inputs">
                                <div class="group">
                                    <input type="text" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Имя</label>
                                  </div>
                                  <div class="group">
                                    <input type="text" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Фамилия</label>
                                  </div>
                                  <div class="group">
                                    <input type="text" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Телефон</label>
                                  </div>
                                  <div class="group">
                                    <input type="text" required>
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Почта</label>
                                  </div>
                                <div class="modal_input">
                                    <div class="cbx_title">Доставка</div>
                                    <input type="checkbox">
                                </div>
                            </div>
                        </div>
                        <div class="wr" id="wr">
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
    <div class="test">
    <a href="{{route('basket.test')}}">Временная кнопка СБРРОСИТЬ КОРЗИНУ</a>
    </div>
    </div>
@endsection
