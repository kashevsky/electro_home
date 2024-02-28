@extends('layouts.main')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .product-table__cell_accent {
            background-color: #ffecc4 !important;
        }
    </style>
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

    <div style="min-width: 900px; max-width: 1400px; margin: 0 auto;">
        <div class="fs-1 fw-semibold mt-3">Сравнение товаров</div>
        <table class="table table-hover table-bordered mt-3">
            <thead>
                <tr>
                    <td class="pb-3 ps-3">
                        <div class="d-flex align-items-center column-gap-2">
                            <input type="checkbox" name="hide-equal">
                            <label>Скрыть одинаковые параметры</label>
                        </div>
                    </td>
                    @foreach ($products as $product)
                        <td>
                            <img src="{{ $product->image }}" width="60">
                            <div>{{ $product->title }}</div>
                            <div class="fw-semibold">{{ $product->price }} р.</div>
                        </td>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($propsArrays as $name => $propsArray)
                    <tr>
                        <td>{{ $name }}</td>
                        @foreach ($propsArray as $prop)
                            <td @class([
                                'product-table__cell_accent' =>
                                    min($propsArray) != max($propsArray) &&
                                    intval($prop) &&
                                    max($propsArray) == $prop,
                            ])>
                                @if ($prop)
                                    {{ $prop }}
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" style="width: 20px; color: #b2b2b2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
