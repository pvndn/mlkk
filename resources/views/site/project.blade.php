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
            <span>Dự án của chúng tôi</span>
          </h3>
        </div>
        <div class="layout-content">
          @if($projects)
              @foreach($projects as $post)
                  <div class="col-md-12 girdfix">
                      <div class="it-new">
                          <div class="col-md-4 col-xs-12 col-sm-12">
                              <div class="row">
                                  <div class="gallery">
                                      <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}">
                                          <img class="img-responsive" src="{{ asset($post->image) }}" alt="{{ $post->name }}" title="{{ $post->name }}">
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-md-8">
                              <div class="row">
                                  <div class="text">
                                      <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}">
                                          <h2>{{ $post->name }}</h2>
                                      </a>
                                      <p>
                                        <?php mb_internal_encoding("UTF-8");?>
                                        {!! mb_substr(strip_tags($post->content), 0, 300) !!}...
                                      </p>
                                      <p class="pull-left">
                                          <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}" class="btn btn-more">Xem chi tiết</a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                  </div>
              @endforeach
          @endif
        </div>
        <nav class="pull-right">
          {!! $projects->appends(Request::query())->render() !!}
        </nav>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @include('site.partials.right-bar')
</div>
@endsection

@section('right-element')
  @include('site.partials.hot_product')
@endsection

@push('css')
  <style media="screen">
    .it-new .text h2 {
      text-align: left;
      padding: 0;
    }

    .it-new {
        box-shadow: unset;
    }
    .btn-more {
      background: #e42129;
      text-transform: uppercase;
      padding: 5px 10px;
      border-radius: 0;
    }
    .layout-content a {
      color: #FFF;
    }
  </style>
@endpush
