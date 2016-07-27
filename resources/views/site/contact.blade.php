@extends('site.layouts.master')

@section('title'){!! $page->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $page->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $page->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
    <div class="container">
        <div class="layout-header">
          <h3>
            <span>{{ $page->name }}</span>
          </h3>
        </div>
        <div class="page">
            <div class="container">
                <div class="ls-new">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="{{ route('post.contact') }}" method="POST" id="contactForm">
                              {{ csrf_field() }}
                                <div class="tile-body">
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="exampleInputName">Họ tên</label>
                                        <input type="text" class="form-control" name="name" placeholder="Họ tên" value="{{ old('name') }}" autocomplete="off" required>
                                        @if( $errors->has('name') )
                                            <span class="help-block mb-0">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputSlug">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputSlug">Số điện thoại</label>
                                        <input type="tel" class="form-control" pattern="^(0|\+[0-9]{1,5})([1-9][0-9]{8}?([0-9]{0,1}))$" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputParent">Nội dung</label>
                                        <textarea name="body" id="_body" class="form-control" required>{{ old('body') }}</textarea>
                                    </div>
                                    <button class="btn btn-primary">Gửi</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="tile-body">
                                @if($page->image)
                                <div class="row" id="baner-image">
                                    <img src="{{ $page->image }}" style="width: 100%;" id="showImage">
                                </div>
                                @endif
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-md-12 content">
                                            {!! $page->content !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
