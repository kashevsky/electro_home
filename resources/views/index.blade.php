@extends('layouts.main')
@section('content')
<script>
    function initBaner() {
        return {
            imgs: ['/img/baner1.jpg','/img/baner2.jpg', '/img/baner3.jpg'],
            counter: 0,
            img: '',
            init() {
                this.img = this.imgs[0]
                setInterval(() => {
                this.img = this.imgs[this.counter];
                this.counter++;
                if(this.counter > this.imgs.length){
                    this.counter = 0;
                    this.img = this.imgs[this.counter];
                }
              }, 1000);
            }
        }
    }
</script>
    <div class="baner" x-data="initBaner()">
        <img :src="img">
    </div>
    <div class="sale_products_container">
    @foreach ($categories as $category)
        <a href="{{ route('category.index', $category->id) }}" class="a">
            <div class="category_container">
                <div class="category_image">
                    <img src="{{ $category->image }}">
                </div>
                <div class="category_title">
                    {{ $category->title }}
                </div>
            </div>
            <div class="category_btn">
                Смотреть
            </div>
        </a>
    @endforeach
    </div>
@endsection

