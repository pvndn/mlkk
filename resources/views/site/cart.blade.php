 asset@extends('site.layouts.master')

@section('title'){!! $post->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $post->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $post->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
<div class="layout-80">
  <div class="layout-header">
    <h3>
      <span>Giỏ hàng của bạn</span>
    </h3>
  </div>
</div>
<div class="">
  <div class="layout-80 layout-about">
    <div class="layout-content">
      @if($cart->count() != 0)
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th></th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cart as $item)
          <tr>
            <td class="action"><a href="{{ route('get.cart', ['product_id' => $item->id, 'remove' => 'true']) }}" class="confirm"><span class="glyphicon glyphicon-remove"></span></a></td>
            <td><img src="{{ asset($item->options->image) }}" width="50"/></td>
            <td>{{ $item->name }}</td>
            <td>{{ number_format($item->price) }} ₫</td>
            <td>
              <div class="cart_quantity_button">
                  <a class="btn btn-default" href="{{ route('get.cart', ['product_id' => $item->id, 'decrease' => 1]) }}"> - </a>
                  <input class="form-control qty" type="number" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2" min="0" max="{{ $item->number }}">
                  <a class="btn btn-default" href="{{ route('get.cart', ['product_id' => $item->id, 'increment' => 1]) }}"> + </a>
              </div>
            </td>
            <td>{{ number_format($item->subtotal) }} ₫</td>
          </tr>
          @endforeach
          <tr>
            <td></td>
            <td></td>
            <td><strong>Tổng giỏ hàng của bạn</strong></td>
            <td></td>
            <td><span class="btn btn-default">{{ Cart::count() }}</span></td>
            <td><strong class="btn btn-default">{{ Cart::total(0) }} ₫</strong></td>
          </tr>
        </tbody>
      </table>
      <div class="action">
        <a href="/" class="btn btn-primary" style="color: white; border-radius: 0;">Tiếp tục mua hàng</a>
        <a href="{{ route('get.cart', ['destroy' => 'true']) }}" class="btn btn-danger confirm" style="color: white; border-radius: 0;">Hủy giỏ hàng</a>
        <a href="{{ route('get.order') }}" class="btn btn-success pull-right" style="color: white; border-radius: 0;">Mua hàng</a>
      </div>
      @else
      <p>Giỏ hàng trống. <a href="/" style="text-decoration: underline;color: #337ab7;">Tiếp tục mua hàng</a></p>
      @endif
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="layout-80">
  <div class="banner-adv">
    <img src="{{ asset('/build/img/banner.png')}}">
  </div>
</div>

<div class="clearfix"></div>

<div class="container">
  <div class="col-md-8">
    <div class="ct-product">
      @if($randProduct->count() != 0)
      <div class="section-product">
        <div class="layout-header">
          <h3>
            <span>Các sản phẩm khác</span>
          </h3>
        </div>
        <div class="layout-content">
          <ul class="product grid">
            @foreach($randProduct as $p)
            <li class="grid-item">
              <a href="{{ route('client.posts', [$p->category->slug, $p->slug]) }}">
                <img src="{{ $p->image }}">
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

@endsection

@push('css')
  <style media="screen">
    .qty {
      width: 20%;
      float: left;
      margin-right: 5px;
    }
    .glyphicon-remove {
      color: red;
    }
  </style>
@endpush

@push('js')
  <script type="text/javascript">
    $('.action .confirm').click(function(e) {
      e.preventDefault();
      var linkURL = $(this).attr("href");
      warnBeforeRedirect(linkURL);
    });

    function warnBeforeRedirect(linkURL) {
      swal({
        title: "Bạn muốn hủy giỏ hàng?",
        text: "Giỏ hàng của bạn sẽ trống sau khi hủy!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Vâng, tôi muốn hủy!',
        closeOnConfirm: false
      }, function(){
          window.location.href = linkURL;
      });
    };

  </script>
@endpush
