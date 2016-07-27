@extends('site.layouts.master')

@section('title'){!! $category->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $category->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $category->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
<div class="container">
  <div class="col-md-9 col-content">
    <div class="ct-product">
      <div class="section-product">
        <div class="layout-header">
          <h3>
            <span>{{ $category->name }}</span>
          </h3>
        </div>
        <div class="layout-content">
          @if($products && $products->count() != 0)
          <ul class="product grid">
            @foreach($products as $product)
            <li class="grid-item">
                <a href="{{ route('client.posts', [$product->category->slug, $product->slug]) }}">
                  <img src="{{ asset($product->image) }}" title="{{ $product->name }}" alt="{{ $product->name }}">
                </a>
                @if($product->price != 0)
                <div class="sale">
                  <img src="{{asset('/build/img/sale.png')}}">
                </div>
                @endif
                <div class="title-name">
                  <h2><a href="{{ route('client.posts', [$product->category->slug, $product->slug]) }}">{{ $product->name }}</a></h2>
                </div>
            </li>
            @endforeach
          </ul>
          @else
            Loại này chưa có sản phẩm...
          @endif
        </div>
        <nav class="pull-right">
          {!! $products->appends(Request::query())->render() !!}
        </nav>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @include('site.partials.right-bar')
</div>
@endsection

@section('news')
  @include('site.partials.news')
@endsection
