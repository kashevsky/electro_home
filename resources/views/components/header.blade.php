<script>
    function initSearch() {
        return {
            input: '',
            searchResults: [],
            init: function() {
                this.$watch('input', (value) => this.searchByQuery(value));
            },
            searchByQuery: function(query) {
                return fetch(`/searchByQuery?query=${query}`)
                    .then(response => response.json())
                    .then(data => this.searchResults = data.searchResults);
            }
        };
    }
</script>

<div class="header_container">
    <div class="header_row">
        <a href="{{ route('index') }}">
            <div class="logo">
                <img src="img/logo.svg">
            </div>
        </a>
        <div x-data="initSearch()" class="search_field">
            <input x-model="input" type="search" class="input_search" placeholder="Поиск...">
            <div class="results">
                <template x-if="searchResults.subCategories">
                    <div class="subCategories">
                        <template x-for="subCategory in searchResults.subCategories">
                            <a :href="'/sub_categories/' + subCategory.id" class="subCategory">
                                <div x-text="subCategory.total"></div>
                                <div x-text="subCategory.title"></div>
                            </a>
                        </template>
                    </div>
                </template>
                <template x-if="searchResults.products">
                    <div class="products">
                        <template x-for="product in searchResults.products">
                            <a :href="'/products/' + product.id" class="product">
                                <div x-text="product.title"></div>
                            </a>
                        </template>
                    </div>
                </template>
            </div>
        </div>
        <div class="phones_container">
            <div class="phones_logo">
                <img src="img/call.svg">
            </div>
            <div class="phones_items">
                <div class="phones_item">
                    <span>А1</span> +375(29) 937 42 43
                </div>
                <div class="phones_item">
                    <span>МТС</span> +375(29) 937 42 43
                </div>
                {{-- <div class="phones_item">
                    <span>Life</span> +375(29) 937 42 43
                </div> --}}
            </div>
        </div>
        <div class="cart">
            <div>
                <img src="img/basket.svg">
            </div>
            <div>Корзина</div>
        </div>
        <div class="login">
            <div>
                <img src="img/user.svg">
            </div>
            <div>
                Регистрация/Вход
            </div>
        </div>
    </div>
    <div class="top_navigation">
        <div class="top_navigation_row">
            @foreach ($categories as $category)
            <div x-data="{open: false}">
                <div @mouseleave="open = false">
                    <a href="" class="category_link" @mouseover="open = true">
                        <div class="top_navigation_row_item">
                            <div class="e">
                                <object type="image/svg+xml" data="{{$category->logo}}">svg-animation</object>
                            </div>
                            <div>
                                {{ $category->title }}
                            </div>
                        </div>
                    </a>
                    <div x-show="open" @mouseleave="open = false" class="menu_sub_categories">
                        @foreach ($category->subCategories as $sub_category)
                        <a href="{{route('sub_category.index', $sub_category->id)}}">
                            <div class="menu_sub_category">
                                <div>
                                    <img src="{{ $sub_category->image }}">
                                </div>
                                <div>
                                    {{ $sub_category->title }}
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>