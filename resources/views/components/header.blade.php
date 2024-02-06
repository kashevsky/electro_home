<script>
    function initSearch() {
        return {
            input: '',
            searchResults: null,
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
        <a href="{{route('index')}}">
            <div class="logo">
                <img src="">
                logo
            </div>
        </a>
        <div x-data="initSearch()" class="search_field">
            <input x-model="input" type="text">
            <div class="results">
                <div class="subCategories">
                    <template x-for="subCategory in searchResults.subCategories">
                        <div class="subCategory">
                            <div x-text="subCategory.total"></div>
                            <a :href="'/sub_categories/' + subCategory.id" class="subCategory">
                                <div x-text="subCategory.title"></div>
                            </a>
                        </div>
                    </template>
                </div>
                <div class="products">
                    <template x-for="product in searchResults.products">
                        <a :href="'/products/' + product.id" class="product">
                            <div x-text="product.title"></div>
                        </a>
                    </template>
                </div>
            </div>
        </div>
        <div class="phones_container">
            <div class="phones_logo">
                <img src="">
            </div>
            <div class="phones_items">
                <div class="Phones_item">
                    8029-937-42-43
                </div>
            </div>
        </div>
        <div class="cart">
            Корзина
        </div>
        <div class="login">
            Кабинет
        </div>
    </div>
</div>