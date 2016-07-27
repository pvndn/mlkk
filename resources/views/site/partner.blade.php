@extends('site.layouts.master')

@section('title'){!! $category->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $category->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $category->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
<div class="container">
  <div class="col-md-9 col-content">
    <div class="ct-product">
      <div class="section-product">
        <div class="layout-content">
          @foreach($categories as $category)
          <?php $partners = $category->partners()->orderBy('id', 'desc')->get(); ?>
          @if($partners && $partners->count() != 0)
          <div class="layout-header">
            <h3>
              <span>{{ $category->name }}</span>
            </h3>
          </div>
            @foreach($partners as $p)
          <div class="col-md-6">
            <div class="p-cs">
              <div class="col-md-5" style="padding: 0;">
                <a href="{{ $p->link }}" target="_blank" style="vertical-align: middle; line-height: 40px;">
                  <img src="{{ $p->logo }}" title="{{ $p->name }}" alt="{{ $p->name }}">
                </a>
              </div>
              <div class="title-name col-md-7">
                <h2><a href="{{ $p->link }}" target="_blank">{{ $p->name }}</a></h2>
              </div>
            </div>
            <div class="title-name col-md-12">
              <strong>Website:</strong> <a href="{{ $p->link }}">{{ $p->link }}</a>
            </div>
            <div class="bx-desc col-md-12">
              {{ $p->desc }}
            </div>
          </div>
            @endforeach
          @endif
        @endforeach
      </div>
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

@push('css')
  <style>
    .p-cs h2 {
      font-size: 13px;
      text-transform: uppercase;
      line-height: 21px;
      margin: 0;
      font-weight: bold;
    }
    .p-cs {
      margin-bottom: 63px;
    }
    .bx-desc {
      text-align: justify;
    }
  </style>
@endpush
