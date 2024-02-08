<script>
    function initFilter() {
        return {
            filterItems: <?= json_encode($filer_items) ?>,
            appliedFilters: <?= json_encode($applied_filters) ?>,
            applyFilter: function(change) {
                // console.log(change.name, change.id);
                if (!location.href.includes('?')) {
                    location.href = `${location.href}?${change.name}[]=${change.id}`;
                } else {
                    location.href = `${location.href}&${change.name}[]=${change.id}`;
                }
            }
        }
    }
</script>
<form x-data="initFilter()" @change="applyFilter($event.target)" x-init="console.log(filterItems)" method="get">
    <div class="filter_container">
        <div class="filter_title">
            Фильтр
        </div>
        <template x-for="filterItem in filterItems">
            <div class="l">
                <template x-if="filterItem.type == 'checkbox'">
                    <div>
                        <div x-text="filterItem.parametr" class="filter_name"></div>
                        <template x-for="item in filterItem.items">
                            <div class="checkbox_container">
                                <input :id="item" type="checkbox" :checked="appliedFilters[filterItem.slug].includes(item)" :name="filterItem.slug" class="checkbox">
                                <div>
                                    <label x-text="item"></label>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
                <template x-if="filterItem.type == 'input'">
                    <div>
                        <div x-text="filterItem.parametr"></div>
                        <template x-for="item in filterItem.items">
                            <div>
                                <div class="adjacent_inputs">
                                    <input type="text" name="from" placeholder="От">
                                    <input type="text" name="to" placeholder="До">
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
        </template>
    </div>
    <input type="hidden" name="sub_category_id" value="{{ $sub_category->id }}">
</form>