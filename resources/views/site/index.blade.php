@extends('site.layouts.master')
@section('title'){!! $setting->title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $setting->description or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $setting->keyword or 'thuê xe máy Phương Bình' !!}@endsection
@section('content')
    <div class="layout-80">
        <div class="layout-header">
            <h3>
                <span>Về chúng tôi</span>
            </h3>
        </div>
    </div>
    <div class="about-us">
        <div class="layout-80 layout-about">
            <div class="layout-content">
                <ul>
                  @foreach($pageIndex as $p)
                    <li>
                        <img src="{{ asset($p->image) }}">
                        <div>
                            <h4><a href="{{ route('client.category', $p->slug) }}">{{ $p->name }}</a></h4>
                            <p class="warn">
                              <?php mb_internal_encoding("UTF-8");?>
                              {!! mb_substr(strip_tags($p->content), 0, 100) !!}...
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="layout-80">
        @if($hl_products && $hl_products->count() != 0)
        <div class="section-product">
            <div class="layout-header">
                <h3>
                    <span>Sản phẩm nổi bật</span>
                </h3>
            </div>
            <div class="layout-content">
                <ul class="product grid">
                  @foreach($hl_products as $hl_product)
                    <li class="grid-item">
                        <a href="{{ route('client.posts', [$hl_product->category->slug, $hl_product->slug]) }}">
                          <img src="{{ $hl_product->image }}" title="{{ $hl_product->name }}" alt="{{ $hl_product->name }}">
                        </a>
                        @if($hl_product->price != 0)
                        <div class="sale">
                          <img src="{{asset('/build/img/sale.png')}}">
                        </div>
                        @endif
                        <div class="title-name">
                          <h2><a href="{{ route('client.posts', [$hl_product->category->slug, $hl_product->slug]) }}">{{ $hl_product->name }}</a></h2>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        @if($categories && $categories != null)
          @foreach($categories as $category)
          <?php $cate = $category->select('id')->whereBetween('lft',[$category->lft, $category->rgt])->get(); ?>
          <?php $products = \App\Models\Product::whereIn('category_id', $cate)->orderBy('id', 'desc')->get(); ?>
        <div class="section-product">
            <div class="layout-header">
                <h3>
                    <span>{{ $category->name }}</span>
                </h3>
            </div>
            <div class="layout-content">
                <ul class="product grid">
                  @foreach($products as $product)
                    <li class="grid-item">
                        <a href="{{ route('client.posts', [$product->category->slug, $product->slug]) }}">
                          <img src="{{ $product->image }}" title="{{ $product->name }}" alt="{{ $product->name }}">
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
            </div>
        </div>
          @endforeach
        @endif
        <div class="activity">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="layout-header">
                    <h3>
                        <span>Video hoạt động</span>
                    </h3>
                </div>
                <div class="layout-content">
                    {!! $setting['video'] or 'Đang cập nhật' !!}
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 bx-help">
                <div class="layout-header">
                    <h3>
                        <span>Tư vấn-hỗ trợ</span>
                    </h3>
                </div>
                <div class="layout-content contact">
                    <h4><i>Hãy để lại thông tin chúng tôi sẽ liên hệ với Quý Khách</i></h4>
                    <div class="contact-form">
                        <form action="{{ route('post.contact') }}" method="POST" id="contactForm">
                          {{ csrf_field() }}
                            <input type="text" name="name" placeholder="Họ tên ..." autocomplete="off" required>
                            <input type="email" name="email" placeholder="Địa chỉ e-mail ..." autocomplete="off" required>
                            <input type="tel" pattern="^(0|\+[0-9]{1,5})([1-9][0-9]{8}?([0-9]{0,1}))$" name="phone" placeholder="Số điện thoại ..." autocomplete="off" required>
                            <input type="text" id="_body" name="body" placeholder="Yêu cầu ..." autocomplete="off" required>
                            <div class="clearfix"></div>
                            <button class="btn-gr">Gởi yêu cầu</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6 bx-achieve">
                <div class="layout-header">
                    <h3>
                        <span>Thành tích đạt được</span>
                    </h3>
                </div>
                <div class="layout-content achieve">
                  {!! generateImage('_*y5!s5_E5Rf') !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        @include('site.partials.partner')
    </div>
@endsection

@section('news')
  @include('site.partials.news')
@endsection
