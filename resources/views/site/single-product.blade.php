@extends('site.layouts.master')

@section('title'){!! $post->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $post->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $post->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
<div class="layout-80">
  <div class="layout-header">
    <h3>
      <span>{{ $product->category->name }}</span>
    </h3>
  </div>
</div>
<div class="product-detail">
  <div class="layout-80 layout-about">
    <div class="layout-content">
      <div class="sngl-top">
        <div class="col-md-4 single-top-left">
          <div id="slideshow">
            <div class="slider-inner">
              <ul>
              @foreach($product->albums->take(5) as $album)
                <li id="img-{{ $album->id }}" class="img-wrapper"  data-img-id="{{ $album->id }}"  style="background-image: url({{ asset($album->photo) }})"></li>
              @endforeach
              </ul>
            </div>
            <div class="thumbs-container bottom">
              <div id="prev-btn" class="prev">
                <i class="glyphicon glyphicon-chevron-left"></i>
              </div>
              <div class="inner-thumb" align="center">
                <ul class="thumbs">
                  @foreach($product->albums->take(5) as $album)
                  <li data-thumb-id="{{ $album->id }}" class="thumb" style="background-image: url({{ asset($album->photo) }})"></li>
                  @endforeach
                </ul>
              </div>
              <div id="next-btn" class="next">
                <i class="glyphicon glyphicon-chevron-right"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 right-grid">
          <div class="col-md-7 info-product">
            <h2>
              {{ $product->name }}
            </h2>

            @include('site.partials.social')

            <ul>
              @if($product->guarantee != null)
              <li><span class="hard">Bảo hành:</span> {{ $product->guarantee }} tháng </li>
              @endif
              <li><span class="hard">Tình trạng:</span> {!! $product->numbers !== 0 ? 'còn hàng' : '<span style="color:red">Hết hàng</span>' !!}</li>
              <!--SV -->
              @if($product->price != 0)
                <?php $price_market = $product->price_market; ?>
                <?php $price = $product->price; ?>
                <li class="pr-mk">Giá thị trường: {{ number_format($price_market) }} VNĐ</li>
              @else
                <?php $price = $product->price_market; ?>
              @endif
              <!-- CLOSE-->
              <li><span class="hard">Giá bán:</span> {!! $price != 0 ? number_format($price).' VNĐ' : '<span style="text-transform: uppercase; letter-spacing: 0.75px; font-weight: bold;">Liên hệ để biết giá</span>' !!} </li>
            </ul>
            @if($product->desc != null)
              <p class="_desc_product">
                <i>{{ $product->desc }}</i>
              </p>
            @endif
            @if($product->numbers != 0)
            <form method="POST" action="{{ route('post.cart') }}" style="width: 140px;float: left;">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn-buy">
                    <i class="fa fa-shopping-cart"></i>
                    Mua ngay
                </button>
            </form>
            @else
            <p style="border: 1px solid #e4e4e4; padding: 10px; box-shadow: 0 0 1px #f5f5f5; color: #e42129">Sản phẩm hiện đã hết hàng. Hãy liên hệ để đặt hàng!</p>
            @endif
            <span class="help-buy">
              <a href="#" data-toggle="modal" data-target="#myModal">Hướng dẫn mua hàng</a>
            </span>
          </div>
          <div class="col-md-5 security">
            <div class="ser-header">
              <h2>Công ty chúng tôi cam kết</h2>
              <div class="slogan-img">
                <img src="{{asset('/build/img/security.png')}}">
              </div>
            </div>
            <div class="ser-content">
              {!! $setting['cam_ket'] or null !!}
            </div>
          </div>
          <div class="col-md-12 help">
            <div class="col-md-2"></div>
            <div class="col-md-4 address address-1">
              {!! $setting['co_so_1'] or null !!}
            </div>
            <div class="col-md-4 address">
              {!! $setting['co_so_2'] or null !!}
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="layout-80">
  <div class="banner-adv">
    {!! generateImage('a7s@L6ZHF^v*') !!}
  </div>
</div>

<div class="clearfix"></div>

<div class="layout-80">
  <div class="col-md-8" style="padding: 0;">
    <div class="ct-product">
      <div class="section-product">
        <div class="layout-content">
          <div class="tile-body p-0">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs tabs-dark" role="tablist">
                        <li role="presentation" class="active"><a href="#feed-all" aria-controls="all" role="tab" data-toggle="tab">Giới thiệu sản phẩm</a></li>
                        <li role="presentation"><a href="#feed-friends" aria-controls="friends" role="tab" data-toggle="tab">Bình luận (<span class="fb-comments-count" data-href="{{ Request::url() }}"></span>)</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="feed-all">
                            <div class="wrap-reset">
                                {!! $product->content !!}
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="feed-friends">
                            <div class="wrap-reset">
                                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
      </div>
      @if($same_products->count() != 0)
      <div class="section-product">
        <div class="layout-header">
          <h3>
            <span>Sản phẩm cùng loại</span>
          </h3>
        </div>
        <div class="layout-content">
          <ul class="product grid">
            @foreach($same_products as $p)
            <li class="grid-item">
              <a href="{{ route('client.posts', [$p->category->slug, $p->slug]) }}">
                <img src="{{ asset($p->image) }}">
              </a>
              @if($p->price != 0)
              <div class="sale">
                <img src="{{asset('/build/img/sale.png')}}">
              </div>
              @endif
              <div class="title-name">
                <h2><a href="{{ route('client.posts', [$p->category->slug, $p->slug]) }}">{{ $p->name }}</a></h2>
              </div>
            </li>
              @endforeach
          </ul>
        </div>
      </div>
      @endif
    </div>
  </div>

  @include('site.partials.right-bar')
</div>

@include('site.partials.modals')
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset(elixir('css/flexslider.css')) }}" type="text/css" media="screen" />
<style>
  .slider-inner ul li {
    display: list-item;
  }
  ._desc_product {
    padding: 5px;
    height: 80px;
    overflow: auto;
    font-size: 1em;
    margin-bottom: 5px;
  }
</style>
@endpush

@push('js')
<script src="{{ asset(elixir('js/imagezoom.js')) }}"></script>
<script defer src="{{ asset(elixir('js/slider.js')) }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".img-wrapper:first-child").addClass("active");
    $(".thumbs > .thumb:first-child").addClass("active");
    $(".address-1").css('margin-left', '15px');
  });
</script>
@endpush
