@extends('site.layouts.master')

@section('title'){!! $post->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $post->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $post->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
<div class="container">
  <div class="col-md-9 col-content">
    <div class="ct-product">
      <div class="section-product">
        <div class="layout-header">
          <h3>
            <span>{{ $post->category->name }}</span>
          </h3>
        </div>
        <div class="layout-content">
          <div class="tile-body">
              <div>
                  <h3 class="animated bounceIn" style="visibility: visible; -webkit-animation-delay: 1.5s;">
                      <span>{{ $post->name }}</span>
                  </h3>
                  <div align="center" style="background: #f2f2f2; padding: 10px 5px 0; border-radius: 3px; margin-bottom: 10px;">
                    @include('site.partials.social')
                  </div>
                  <div class="row">
                      <div class="col-md-12 content">
                          {!! $post->content !!}
                      </div>
                  </div>
              </div>
              <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      @if(isset($project_same) && $project_same->count() != 0)
      <div class="section-product">
        <div class="layout-header">
          <h3>
            <span>Các dự án khác</span>
          </h3>
        </div>
        <div class="layout-content" align="center">
          <div class="same_project">
            <ul>
              @foreach($project_same as $artcile)
              <li>
                <a href="{{ route('client.posts', [$artcile->category->slug, $artcile->slug]) }}">
                  <img src="{{ asset($artcile->image) }}">
                </a>
                <div>
                  <h2><a href="{{ route('client.posts', [$artcile->category->slug, $artcile->slug]) }}">{{ $artcile->name }}</a></h2>
                  <div class="desc">
                    <?php $findspace = @strpos($artcile->content, ' ', 100) ? : 250; ?>
                    {!! substr($artcile->content, 0, $findspace) !!}
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      @endif
    </div>
  </div>
  @include('site.partials.right-bar')
</div>
@endsection

@section('news')
  @include('site.partials.news')
@endsection

@push('css')
    <style type="text/css">
        .page img {
            max-width: 100%;
        }

        .same_project ul li {
          float: left;
          margin: 0 10px;
        }

        .same_project h2 {
          font-size: 13px;
          text-align: center;
          font-weight: bold;
          line-height: 21px;
          margin: 10px 0;
          text-transform: uppercase;
        }

        .same_project h2 a {
          color: #e42129;
        }

        .same_project .desc {
          text-align: justify;
          font-size: 13px;
        }
    </style>
@endpush
