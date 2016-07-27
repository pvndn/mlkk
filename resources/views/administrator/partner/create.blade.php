@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Đối tác - khách hàng</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">đối tác - khách hàng</a>
		            </li>
		            <li>
		                <a href="">thêm</a>
		            </li>
		        </ul>

		        <div class="page-toolbar">
		            <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
		                <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
		            </a>
		        </div>

		    </div>
		</div>

		<div class="row">
			<form action="{{ route('admin.partner.store') }}" method="POST">
				{{ method_field('POST') }}
				{{ csrf_field() }}
		        <div class="col-md-6">
		            <section class="tile">
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font"><strong>Main </strong>Form</h1>
		                    <ul class="controls">
		                        <li class="dropdown">
		                            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
		                                <i class="fa fa-cog"></i>
		                                <i class="fa fa-spinner fa-spin"></i>
		                            </a>
		                            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
		                                <li>
		                                    <a role="button" tabindex="0" class="tile-toggle">
		                                        <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
		                                        <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
		                                    </a>
		                                </li>
		                                <li>
		                                    <a role="button" tabindex="0" class="tile-refresh">
		                                        <i class="fa fa-refresh"></i> Refresh
		                                    </a>
		                                </li>
		                                <li>
		                                    <a role="button" tabindex="0" class="tile-fullscreen">
		                                        <i class="fa fa-expand"></i> Fullscreen
		                                    </a>
		                                </li>
		                            </ul>

		                        </li>
		                    </ul>
		                </div>
		                <div class="tile-body">
	                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="exampleInputName">Tên đối tác</label>
	                            <input type="text" class="form-control" name="name" placeholder="Tên đối tác" value="{{ old('name') }}">
	                        	@if( $errors->has('name') )
	                        		<span class="help-block mb-0">
	                        			{{ $errors->first('name') }}
	                        		</span>
	                        	@endif
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputSlug">Slug</label>
	                            <input type="text" class="form-control" name="slug" placeholder="your-slug" value="{{ old('name') }}">
	                        </div>
													<div class="form-group">
	                            <label for="exampleInputParent">Danh mục</label>
	                            <select name="category_id" class="form-control mb-10">
                                    @if( $categories )
                                    	@foreach( $categories as $v)
                                    		<option value="{{ $v->id }}"> {{ $v->name }} </option>
                                    	@endforeach
                                    @endif
                                </select>
	                        </div>
		                	<div class="clearfix"></div>
		                </div>
		            </section>
		        </div>
		        <div class="col-md-6">
		        	<section class="tile">
		                <div class="tile-body">
											<div class="input-group">
												<input id="thumbnail" class="form-control" type="text" name="logo" placeholder="Logo đối tác">
												<span class="input-group-btn">
													<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
														<i class="fa fa-picture-o"></i>
													</a>
												</span>
											</div>

			                <div class="col-md-6 col-md-offset-3">
			                	<img id="holder" style="width: 100%;">
			                </div>

			                <div class="clearfix"></div>

											<div class="form-group">
													<label for="exampleInputSlug">Website (Link)</label>
													<input type="url" class="form-control" name="link" placeholder="Website đối tác" value="{{ old('link') }}">
											</div>

	                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
	                        <label for="exampleInputParent">Mô tả đối tác</label>
													<input type="text" class="form-control" name="desc" placeholder="Giới thiệu đối tác" value="{{ old('desc') }}">
													@if( $errors->has('desc') )
														<span class="help-block mb-0">
															{{ $errors->first('desc') }}
														</span>
													@endif
											</div>
	                    <button type="submit" class="btn btn-rounded btn-primary btn-sm">Lưu</button>
		                </div>
		            </section>
		        </div>
		    </form>
	    </div>
	</div>
@endsection

@push('scripts')
	<script src="/vendor/tinymce/tinymce.min.js"></script>
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script>
		$('#lfm').filemanager('image');
	</script>
@endpush
