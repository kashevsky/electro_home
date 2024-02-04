<script>
    function initSearch() {
        return {
            input: '',
            results: null,
            init: function() {
                this.$watch('input', (value) => this.searchByQuery(value));
            },
            searchByQuery: function(query) {
                return fetch(`/searchByQuery?query=${query}`)
                    .then(response => response.json())
                    .then(data => this.results = data.results);
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
            <template x-if="results && results.length">
                <div class="results">
                    <template x-for="result in results">
                        <div class="result">
                            <div class="category" x-text="result.category_title"></div>
                            <div class="sub_category" x-text="result.sub_category_title"></div>
                            <a :href="'/products/' + result.product.id" class="product" x-text="result.product.title"></a>
                        </div>
                    </template>
                </div>
            </template>
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