@extends('site.layouts.master')

@section('title'){!! $setting->title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $setting->description or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $setting->keyword or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
<div class="container">
  <div class="col-md-12">
    <div class="ct-product">
      <div class="section-product">
        <div class="layout-header">
          <h3>
            <span>Thông tin đặt hàng</span>
          </h3>
        </div>
        <div class="layout-content">
          @if(Cart::count() != 0)
          <div class="col-md-5">
            <form action="{{ route('post.order') }}" method="POST" data-toggle="validator" role="form" id="formsub">
              <div class="tile-body">
                  {{ csrf_field() }}
                  {{ method_field('POST') }}
                  <div class="form-group">
                      <label for="inputName" class="control-label">Họ tên <span class="require">*</span></label>
                      <input type="text" class="form-control" id="inputName" name="name" placeholder="Họ tên" value="{{ old('name') }}" data-error="Nhập họ tên của bạn" required>
                      <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail" class="control-label">Email <span class="require">*</span></label>
                      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Địa chỉ E-mail" value="{{ old('email') }}" data-error="Địa chỉ E-mail không hợp lệ" required>
                      <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group has-feedback">
                      <label for="inputTwitter" class="control-label">Số điện thoại <span class="require">*</span></label>
                      <input type="tel" pattern="^(0|\+[0-9]{1,5})([1-9][0-9]{8}?([0-9]{0,1}))$" name="phone" maxlength="11" class="form-control" id="inputTwitter" data-error="Số điện thoại không hợp lệ" value="{{ old('phone') }}" placeholder="Số điện thoại" required>
                      <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                      <label for="inputAddress" class="control-label">Địa chỉ <span class="require">*</span></label>
                      <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Địa chỉ nhận hàng" value="{{ old('address') }}" required data-error="Nhập địa chỉ nhận hàng">
                      <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputSlug">Ghi chú</label>
                      <textarea name="messages" class="form-control" placeholder="Ghi chú của bạn" id="txtmessage">{{ old('message') }}</textarea>
                  </div>
                  <div class="clearfix"></div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" id="button"><i class="fa fa-arrow-right"></i> Đặt thuê</button>
              </div>
            </form>
          </div>
          <div class="col-md-7">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Sản phẩm</th>
                  <th>Giá</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                @foreach(Cart::content() as $item)
                <tr>
                  <td><img src="{{ asset($item->options->image) }}" width="50"/></td>
                  <td>{{ $item->name }} <strong>x {{ $item->qty }}</strong></td>
                  <td>{{ number_format($item->price) }} ₫</td>
                  <td>{{ number_format($item->subtotal) }} ₫</td>
                </tr>
                @endforeach
                <tr>
                  <td></td>
                  <td><strong>Tổng giỏ hàng của bạn</strong></td>
                  <td><span class="btn btn-default">{{ Cart::count() }}</span></td>
                  <td><strong class="btn btn-default">{{ Cart::total(0) }} ₫</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

@push('css')
  <style>
    .require {
      color: red;
    }
  </style>
@endpush

@push('js')
  <script src="{{ asset(elixir('js/validator.js')) }}"></script>
@endpush
