@extends('layouts.main')
@section('content')
    <script>
        function initProducts() {
            return {
                products: <?= json_encode($products) ?>,
                filterItems: <?= json_encode($filer_items) ?>,
                init: function() {
                    document.addEventListener('DOMContentLoaded', () => {
                        const url = new URL(location);
                        const searchParams = url.searchParams;
                        const orderBy = searchParams.get('order');
                        const order = document.querySelector('select[name=order]');
                        if (orderBy) {
                            order.querySelector(`option[value="${orderBy}"]`).selected = 1;
                        } else {
                            order.querySelector(`option[value=""]`).selected = 1;
                        }
                    });
                },
                applyFilter: function(filter) {
                    var name = filter.name;
                    var value = filter.id;

                    const url = new URL(location);
                    const searchParams = url.searchParams;

                    if (Object.hasOwn(filter, 'from') && Object.hasOwn(filter, 'to')) {
                        if (filter.from) {
                            searchParams.set(`${name}[from]`, filter.from);
                        } else {
                            searchParams.delete(`${name}[from]`);
                        }

                        if (filter.to) {
                            searchParams.set(`${name}[to]`, filter.to);
                        } else {
                            searchParams.delete(`${name}[to]`);
                        }
                    } else {
                        this.updateSearchParams(searchParams, name, value);
                    }

                    history.pushState({}, "", url);

                    this.searchProducts();
                },
                applySort: function(sort) {
                    const url = new URL(location);
                    const searchParams = url.searchParams;
                    if (sort.value) {
                        searchParams.set(sort.name, sort.value);
                    } else {
                        searchParams.delete(sort.name);
                    }
                    history.pushState({}, "", url);

                    this.searchProducts();
                },
                updateSearchParams: function(searchParams, name, value) {
                    if (searchParams.has(name)) {
                        if (searchParams.has(name, value)) {
                            searchParams.delete(name, value);
                        } else {
                            searchParams.append(name, value);
                        }
                    } else {
                        searchParams.set(name, value);
                    }
                },
                getFilterValue: function(name) {
                    const url = new URL(location);
                    const searchParams = url.searchParams;

                    return searchParams.get(name);
                },
                isFilterApplied: function(name, item) {
                    const url = new URL(location);
                    const searchParams = url.searchParams;

                    return searchParams.has(name, item);
                },
                searchProducts: function() {
                    fetch(`/sub_categories/{{ $sub_category->id }}/searchProducts${location.search}`)
                        .then(response => response.json())
                        .then(data => this.products = data.products);
                },
                addToComparison: function(product) {
                    sendAjax('/add_to_comparison', {
                        productId: product.id
                    });
                },
                removeFromComparison: function(product) {
                    sendAjax('/remove_from_comparison', {
                        productId: product.id
                    });
                }
            }
        }
    </script>

    <div x-data="initProducts()" class="products_container">
        <div class="items_title">
            <h1>{{ $sub_category->title }}</h1>
        </div>
        <div class="content_line">
            <div class="filter">
                @include('components.filter')
            </div>
            <div class="products_items">
                <template x-for="product in products">
                    <a :href="'/products/' + product.id">
                        <div class="product_container">
                            <div class="product_image">
                                <img :src="product.image">
                                <template x-if="product.is_sale">
                                    <div class="sale_img">
                                        <img src="img/sale.png">
                                    </div>
                                </template>
                            </div>
                            <div class="product_text">
                                <div class="product_title">
                                    <h2 x-text="product.title"></h2>
                                </div>
                                <div class="product_description" x-text="product.description">
                                </div>
                                <div class="product_checkboks">
                                    <div class="product_checkboks_line">
                                        <input
                                            @click="$el.checked ? addToComparison(product) : removeFromComparison(product)"
                                            type="checkbox" class="checkbox">
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
                                    <span x-text="product.price"></span> Руб
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
                </template>
            </div>
            <div class="sorting">
                <select @change="applySort($el)" name="order">
                    <option value="price:asc">Сначала дешевые</option>
                    <option value="price:desc">Сначала дорогие</option>
                    <option value="created_at:desc">Сначала новые</option>
                    <option value="">Сначала актуальные</option>
                </select>
            </div>
        </div>
        <div class="sub_product_long_text">
            <p>Бытовая техника - это различные приборы, которые человек использует в быту. А быт - это все, что связано с
                жизнью человека и его основными потребностями ( пища, отдых, личная гигиена и так далее ).</p>
            <br>
            <p>Бытовая техника призвана облегчить человеку жизнь, освободить его от нудной, тяжелой, монотонной работы и
                домашних обязанностей и не только домашних. Бутовая техника используется и на работе, и в учебе. Полностью
                она человека не заменяет, но ежедневные обязанности по дому упрощает, а досуг делает интереснее и
                разнообразнее.</p>
            <br>
            <p>Если открыть сайт любого интернет-магазина бытовой техники, то можно заметить, что всю бытовую технику
                условно можно разделить на группы:</p>
            <br>
            <ul>
                <li>кухонная техника ( крупная, мелкая, встраиваемая ): газовые и электроплиты, микроволновые печи, миксеры,
                    блендеры, кухонные комбайны, овощерезки, блинницы, тостеры, мультиварки, холодильники, морозильники,
                    электросушилки, посудомоечные машины и так далее;</li>
                <li>теле-, видео- и аудио- техника: телевизоры, плееры, и пр.;</li>
                <li>техника для уборки и ухода за одеждой: пылесосы, стиральные машины, утюги, отпариватели.</li>
            </ul>
        </div>
    </div>
@endsection
