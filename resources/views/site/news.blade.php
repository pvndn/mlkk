@extends('site.layouts.master')

@section('title'){!! $category->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $category->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $category->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
    <div class="container">
      <div class="col-md-12">
        <div class="ct-product">
          <div class="section-product">
            <div class="layout-header">
              <h3>
                <span>{{ $category->name }}</span>
              </h3>
            </div>
            <div class="layout-content">
              @if($news)
                  @foreach($news as $post)
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 girdfix">
                          <div class="it-new">
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                  <div class="row">
                                      <div class="gallery">
                                          <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}">
                                              <img class="img-responsive" src="{{ asset($post->image) }}" alt="{{ $post->name }}" title="{{ $post->name }}">
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                  <div class="row">
                                      <div class="text">
                                          <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}">
                                              <h2>{{ $post->name }}</h2>
                                          </a>
                                          <p>
                                              <?php $findspace = @strpos($post->content, ' ', 80) ?: 120; ?>
                                              {!! substr($post->content, 0, $findspace) !!} ...
                                          </p>
                                          <p class="pull-right">
                                              <a href="{{ route('client.posts', [$post->category->slug, $post->slug]) }}">Xem chi tiết</a>
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
              {!! $news->appends(Request::query())->render() !!}
            </nav>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
@endsection
