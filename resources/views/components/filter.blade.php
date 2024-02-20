<form>
    <div class="filter_container">
        <div class="filter_title">
            Фильтр
        </div>
        <div class="low_filter">
            <select name="order" onclick="orderProducts()" id="select">
                <option value="standart" selected="selected">Стандарт</option>
                <option value="hight_price">Сначала дорогие</option>
                <option value="low_price">Сначала дешевые</option>
                <option value="r3">Популярность</option>
            </select>
        </div>
        <template x-for="filterItem in filterItems">
            <div class="l">
                <template x-if="filterItem.is_ranged == 0">
                    <div>
                        <div x-text="filterItem.parametr" class="filter_name"></div>
                        <template x-for="item in filterItem.items">
                            <div class="checkbox_container">
                                <input @change="applyFilter($event.target)" :data-is-ranged="filterItem.is_ranged" :id="item" :type="filterItem.type" :checked="isFilterApplied(`${filterItem.name}[]`, item)" :name="`${filterItem.name}[]`" class="checkbox">
                                <div>
                                    <label x-text="item"></label>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
                <template x-if="filterItem.is_ranged == 1">
                    <div x-data="{
                                from: getFilterValue(`${filterItem.name}[from]`) ?? null,
                                to: null,
                                chosenValues: [],
                                updateRangedFilter: function(item, name) {
                                    var chosenValues = this.chosenValues;
                                    var min, max;

                                    if (!chosenValues.length) {
                                        min = null;
                                        max = null;
                                    } else {
                                        chosenValues = chosenValues.map((value) => parseInt(value));

                                        min = Math.min(...chosenValues);
                                        max = Math.max(...chosenValues);
                                    }

                                    applyFilter({
                                        name: name,
                                        from: min,
                                        to: max
                                    });

                                    this.from = min;
                                    this.to = max;
                                }
                            }">
                        <div x-text="filterItem.parametr"></div>

                        <template x-if="filterItem.type == 'input'">
                            <div class="adjacent_inputs">
                                <input :value="from" @change="from = $el.value; applyFilter({name: filterItem.name, from: from, to: to})" :data-is-ranged="filterItem.is_ranged" :type="filterItem.type" :name="`${filterItem.name}[from]`" placeholder="От">
                                <input :value="to" @change="to = $el.value; applyFilter({name: filterItem.name, from: from, to: to})" :data-is-ranged="filterItem.is_ranged" :type="filterItem.type" :name="`${filterItem.name}[to]`" placeholder="До">
                            </div>
                        </template>
                        <template x-if="filterItem.type == 'checkbox'">
                            <div>
                                <template x-for="item in filterItem.items">
                                    <div>
                                        <div class="checkbox_container">
                                            <input @change="chosenValues.includes(item) ? chosenValues = chosenValues.filter((value) => value != item) : chosenValues.push(item); updateRangedFilter(item, filterItem.name)" :data-is-ranged="filterItem.is_ranged" :id="item" :type="filterItem.type" :checked="isFilterApplied(filterItem.name, item)" :name="filterItem.name" class="checkbox">
                                            <div>
                                                <label x-text="item"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <input>
                                </template>
                                <div style="display: flex;">
                                    <input :value="from" @change="from = $el.value; applyFilter({name: filterItem.name, from: from, to: to})" style="width: 50%;" :data-is-ranged="filterItem.is_ranged" type="text" :name="`${filterItem.name}[from]`" placeholder="От">
                                    <input :value="to" @change="to = $el.value; applyFilter({name: filterItem.name, from: from, to: to})" style="width: 50%;" :data-is-ranged="filterItem.is_ranged" type="text" :name="`${filterItem.name}[to]`" placeholder="До">
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
