@extends('layouts.main')

@foreach ($products as $product)
    {{ $product->title }}
@endforeach
