@extends('administrator.layouts.master')

@section('content')
	<div class="page page-gallery">
		<div class="pageheader">
		    <h2>Hình ảnh</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">hình ảnh</a>
		            </li>
		            <li>
		                <a href="">Thêm ảnh</a>
		            </li>
		        </ul>

		    </div>
		</div>
		<div class="row">
			<form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
				{{ method_field('POST') }}
				{{ csrf_field() }}
				<input type="hidden" name="key" value="{{ generateRandomString(12) }}">
				<div class="col-md-6">
            <section class="tile">
                <div class="tile-header dvd dvd-btm">
                    <h1 class="custom-font">Nhập thông tin</h1>
                </div>
                <div class="tile-body">
                      <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="exampleInputName">Tiêu đề cho hình ảnh</label>
                          <input type="text" class="form-control" name="title" placeholder="Enter title slider" value="{{ old('title') }}">
                      	@if( $errors->has('name') )
                      		<span class="help-block mb-0">
                      			{{ $errors->first('name') }}
                      		</span>
                      	@endif
                      </div>
                      <div class="form-group">
                          <label for="exampleInputSlug">Mô tả</label>
                          <textarea class="form-control" name="desc">{{ old('desc') }}</textarea>
                      </div>
                      <div class="form-group">
                      	<span class="input-group-btn">
										        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
										          <i class="fa fa-picture-o"></i> Chọn hình ảnh
										        </a>
										    </span>
										    <input id="thumbnail" class="form-control" type="text" name="image">
                      </div>
                  	<button type="submit" class="btn btn-rounded btn-primary btn-sm pull-right">Lưu</button>
                	<div class="clearfix"></div>
                </div>
            </section>
        </div>
        <div class="col-md-6">
        	<img id="holder" style="width: 100%;">
        </div>
			</form>
		</div>
	</div>
@endsection

@push('scripts')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script>
		$('#lfm').filemanager('image');
	</script>
@endpush
