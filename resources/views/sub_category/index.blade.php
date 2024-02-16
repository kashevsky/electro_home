@extends('layouts.main')
@section('content')
    <script>
        function initProducts() {
            return {
                products: <?= json_encode($products) ?>,
                filterItems: <?= json_encode($filer_items) ?>,
                applyFilter: function(filter) {
                    var name = filter.name;
                    var value = filter.id;

                    const url = new URL(location);
                    const searchParams = url.searchParams;

                    if (value == undefined && Object.hasOwn(filter, 'from') && Object.hasOwn(filter, 'to')) {
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
        </div>
    </div>
@endsection
