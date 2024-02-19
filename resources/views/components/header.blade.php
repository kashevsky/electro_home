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
<script>
    window.addEventListener('scroll', function() {
    let offset = pageYOffset;
    if(offset > 190){
        document.getElementById('nav').classList.add("fixed");
        document.getElementById('nav_plug').classList.add("nav_plug");
        document.getElementById('content').classList.add("padding");
    }
    if(offset < 190){
        document.getElementById('nav_plug').style.height="0px";
        document.getElementById('nav').classList.remove("fixed");
        document.getElementById('nav_plug').classList.remove("nav_plug");
        document.getElementById('content').classList.remove("padding");
    }
});
</script>

<div class="header_container">
    <div id="nav_plug">
    </div>
    <div class="header_row" id="nav">
        <a href="{{ route('index') }}">
            <div class="logo">
                <img src="img/logo.svg">
            </div>
        </a>
        <div x-data="initSearch()" class="search_field">
            <input x-model="input" type="search" class="input_search" placeholder="Поиск...">
            <template x-if="searchResults.products.length > 0">
                <div class="results">
                    <template x-if="searchResults.subCategories">
                        <div class="subCategories">
                            <template x-for="subCategory in searchResults.subCategories">
                                <a :href="'/sub_categories/' + subCategory.id" class="subCategory">
                                    {{-- <div x-text="subCategory.total"></div> --}}
                                    <div x-text="subCategory.title" class="sub_category_search"></div>
                                </a>
                            </template>
                        </div>
                    </template>
                    <template x-if="searchResults.products">
                        <div class="products">
                            <template x-for="product in searchResults.products">
                                <a :href="'/products/' + product.id" class="product">
                                    <div class="serch_product">
                                    <img :src="product.image">
                                    <div x-text="product.title"></div>
                                    </div>
                                </a>
                            </template>
                        </div>
                    </template>
                </div>
            </template>


        </div>
        <div class="phones_container">
            <div class="phones_logo">
                <img src="img/call.svg">
            </div>
            <div class="phones_items">
                <div class="phones_item">
                    +375(29) 937 42 43<span><img src="img/mts.png" style="width: 32px"></span>
                </div>
                <div class="phones_item">
                    +375(29) 112 54 21<span><img src="img/a1.jpg" style="width: 23px"></span>
                </div>
                <div class="phones_item">
                    +375(25) 317 31 46<span><img src="img/life.png" style="width: 31px; position:relative; top: 2px"></span>
                </div>
            </div>
        </div>
        <div class="cart">
            <div>
                <img src="img/basket.svg">
            </div>
            <div>Корзина</div>
            <div class="basket_counter">
                <template x-if="count > 0">
                    <div x-text="count"></div>
                </template>
                <template x-if="count == 0">
                    <div>{{ session()->get('counter') }}</div>
                </template>
            </div>
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
                <div x-data="{ open: false }">
                    <div @mouseleave="open = false">
                        <a href="" class="category_link" @mouseover="open = true">
                            <div class="top_navigation_row_item">
                                <div class="e">
                                    @if (!str_contains($category->logo, 'png'))
                                        <object type="image/svg+xml" data="{{ $category->logo }}">svg-animation</object>
                                    @else
                                        <img src="{{ $category->logo }}">
                                    @endif
                                </div>
                                <div>
                                    {{ $category->title }}
                                </div>
                            </div>
                        </a>
                        <div x-show="open" @mouseleave="open = false" class="menu_sub_categories">
                            @foreach ($category->subCategories as $sub_category)
                                <a href="{{ route('sub_category.index', $sub_category->id) }}">
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
