<form @change="applyFilter($event.target)">
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
                                <input :data-is-ranged="filterItem.is_ranged" :id="item" type="checkbox" :checked="isFilterApplied(filterItem.name, item)" :name="filterItem.name" class="checkbox">
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
                                    <input :data-is-ranged="filterItem.is_ranged" type="text" :name="`${filterItem.name}[from]`" placeholder="От">
                                    <input :data-is-ranged="filterItem.is_ranged" type="text" :name="`${filterItem.name}[to]`" placeholder="До">
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