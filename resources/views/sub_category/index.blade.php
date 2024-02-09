@extends('layouts.main')
@section('content')
    <script>
        function initProducts() {
            return {
                products: <?= json_encode($products) ?>,
                filterItems: <?= json_encode($filer_items) ?>,
                appliedFilters: <?= json_encode($applied_filters) ?>,
                applyFilter: function(filter) {
                    var isRanged = filter.dataset.isRanged;
                    var name = filter.name;
                    var value;

                    if (isRanged == 1) {
                        value = filter.value;
                    } else {
                        value = filter.id;
                    }

                    this.updateAppliedFilters(name, value);

                    const url = new URL(location);
                    const searchParams = url.searchParams;

                    if (isRanged != 1) {
                        name = `${name}[]`;
                    }

                    this.updateSearchParams(searchParams, name, value);

                    history.pushState({}, "", url);

                    this.searchProducts();
                },
                updateAppliedFilters: function(name, value) {
                    if (this.appliedFilters[name]) {
                        if (this.appliedFilters[name].includes(value)) {
                            this.appliedFilters[name] = this.appliedFilters[name].filter((v) => v != value);
                        } else {
                            this.appliedFilters[name].push(value);
                        }
                    } else {
                        this.appliedFilters[name] = [value];
                    }
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
                isFilterApplied: function(name, item) {
                    return this.appliedFilters[name] && this.appliedFilters[name].includes(item);
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
