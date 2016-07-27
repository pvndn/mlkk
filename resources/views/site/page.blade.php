@extends('site.layouts.master')

@section('title'){!! $page->set_title or 'Thuê xe máy Phương Bình' !!}@endsection
@section('desc'){!! $page->meta_desc or 'Dịch vụ cho thuê xe máy Đà Nẵng Phương Bình hỗ trợ giao xe nhanh chóng tận nơi và sân bay' !!}@endsection
@section('keyword'){!! $page->meta_key or 'thuê xe máy Phương Bình' !!}@endsection

@section('content')
    <div class="container">
      <div class="col-md-9 col-content">
        <div class="ct-product">
          <div class="layout-header">
            <h3>
              <span>{{ $page->name }}</span>
            </h3>
          </div>
          <div class="page">
              <div class="ls-new">
                  <div class="row">
                      <div class="tile-body">
                          <div class="col-md-11">
                              <div class="row">
                                  <div class="col-md-12 content" style="text-align: justify;">
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
      @include('site.partials.right-bar')
    </div>
@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function($) {
        var url = $('#baner-image img').attr('src');
        $('img#showImage').css('display','none');

        $('#baner-image').css({
            'background-image': 'url('+ url +')',
            'background-size': 'cover',
            'background-repeat': 'no-repeat',
            'background-position': 'center center',
            'width': '100%',
            'height': '23em',
        });
    });
</script>
@endpush
