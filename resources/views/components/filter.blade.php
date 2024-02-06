<script>
    function initFilter() {
        return {
            filerItems: <?= json_encode($filer_items) ?>,
        }
    }
    console.log(<?= json_encode($filer_items) ?>);
</script>
<form action="{{ route('filterProducts') }}" method="get">
    <div class="filter_container" x-data="initFilter()">
        <div class="filter_title">
            Фильтр
        </div>
        <template x-for="filerItem in filerItems">
            <div class="l">
                <template x-if="filerItem.type == 'checkbox'">
                    <div>
                        <div x-text="filerItem.parametr" class="filter_name"></div>
                        <template x-for="item in filerItem.items">
                            <div class="checkbox_container">
                                    <input type="checkbox" :name="item" class="checkbox">
                                <div>
                                    <label x-text="item"></label>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
                <template x-if="filerItem.type == 'input'">
                    <div>
                        <div x-text="filerItem.parametr"></div>
                        <template x-for="item in filerItem.items">
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
    <input type="submit">
</form>
