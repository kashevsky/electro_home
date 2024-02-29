@extends('layouts.main')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .product-table__cell_accent {
            background-color: #ffecc4 !important;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
    @php
        $propsArrays = [];

        foreach ($products as $product) {
            foreach ($product->haracteristics as $haracteristic) {
                $propsArrays[$haracteristic->parametr][] = $haracteristic->value;
            }
        }

        $productsCount = $products->count();

        foreach ($propsArrays as $name => $propsArray) {
            if ($productsCount != count($propsArray)) {
                $lack = $productsCount - count($propsArray);
                for ($i = 0; $i < $lack; $i++) {
                    $propsArrays[$name][] = '';
                }
            }
        }
    @endphp

    <script>
        function initComparison() {
            return {
                hideEqual: false,
                products: {!! json_encode($products) !!},
                propsArrays: {!! json_encode($propsArrays) !!}
            };
        }
    </script>

    <div x-data="initComparison()" style="min-width: 900px; max-width: 1400px; margin: 0 auto;">
        <div class="fs-1 fw-semibold mt-3">Сравнение товаров</div>
        <table class="table table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <td class="pb-3 ps-3">
                        <div class="d-flex align-items-center column-gap-2">
                            <input x-model="hideEqual" type="checkbox" name="hide-equal">
                            <label>Скрыть одинаковые параметры</label>
                        </div>
                    </td>
                    <template x-for="product in products">
                        <td>
                            <img :src="product.image" width="60">
                            <div x-text="product.title"></div>
                            <div x-text="product.price + ' р.'" class="fw-semibold"></div>
                        </td>
                    </template>
                </tr>
            </thead>
            <tbody>
                <template x-for="(propsArray, name) in propsArrays">
                    <tr x-show="!hideEqual || (hideEqual && _.uniq(propsArray).length > 1)" x-data="{
                        values: propsArray.map((v) => parseInt(v)).filter(Boolean),
                        min: null,
                        max: null,
                        init: function() {
                            this.min = Math.min(...this.values)
                            this.max = Math.max(...this.values)
                        }
                    }">
                        <td x-text="name"></td>
                        <template x-for="prop in propsArray">
                            <td :class="min != max && parseInt(prop) == max && 'product-table__cell_accent'">
                                <div x-show="prop" x-text="prop"></div>
                                <template x-if="!prop">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" style="width: 20px; color: #b2b2b2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </template>
                            </td>
                        </template>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
@endsection
