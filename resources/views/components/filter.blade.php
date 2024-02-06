<script>
    function initFilter() {
        return {
            haracteristics: <?= $haracteristics ?>;
        }
    }
</script>
<div class="filter_container" x-data="initFilter()">
    <div class="filter_title">
        Фильтр
    </div>
    <template x-for="haracteristic in haracteristics">
        <div x-text="haracteristic">
        </div>
    </template>
    <form>
    <div class="filter_item">
        <input type="checkbox" name="brand">
        <label for="horns">LG</label>
    </div>
    </form>
</div>
