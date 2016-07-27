@extends('administrator.layouts.master')

@section('content')
	<div class="page page-gallery">
		<div class="pageheader">
		    <h2>Setting</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">setting</a>
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
			<form class="form" id="form" action="{{ route('admin.settings.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
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
					<fieldset>
						<div class="tile-body">

							<div class="form-group col-md-6 {{ $errors->has('option_key') ? ' has-error' : '' }}">
								<label class="formLeft" for="param_name">Khóa:<span class="req">*</span></label>
								<div class="formRight">
									<span class="oneTwo">
										<input class="form-control" name="option_key[]" id="param_name" type="text" value="{{ old('option_key') }}" />
									</span>
									<span name="name_autocheck" class="autocheck"></span>
									<div name="name_error" class="clear error">
										@if($errors->has('option_key'))
											{{ $errors->first('option_key') }}
										@endif
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="col-md-4 {{ $errors->has('format') ? ' has-error' : '' }}">
								<label class="formLeft">Loại:</label>
								<div class="formRight">
									<select name="type[]" class="form-control">
										<option value="text">Text</option>
										<option value="textarea">Textarea</option>
										<option value="image">Image</option>
										<option value="editor">Wysiwyg editor</option>
									</select>
									@if( $errors->has('format') )
										<span class="help-block mb-0">
											{{ $errors->first('format') }}
										</span>
									@endif
								</div>
							</div>
							<div class="col-md-2" style="margin-top: 25px;">
								<a class="btn btn-default" onclick="return loadField();">Thêm khóa</a>
							</div>
							<div class="clearfix"></div>
							<div id="record">

							</div>

			    		<div class="formSubmit col-md-12">
			       			<button type="submit" class="btn btn-primary">Cập nhật</button>
			       			<button type="reset" class="btn btn-default">Hủy bỏ</button>
		       		</div>
							<div class="clearfix"></div>
						</div>
					</fieldset>
				</section>
			</form>
		</div>
	</div>

@endsection

@push('css')
<style media="screen">
	.req {
		color: red;
	}
</style>
@endpush

@push('scripts')
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script>
		$('#lfm').filemanager('image');
		$('#lfm-footer').filemanager('image');
	</script>
	

	<script type="text/javascript">
			function loadField() {
				var id = 1 + Math.floor(Math.random() * 3600);
				$('#record').append('<div class="form-group '+id+'"><div class="col-md-6"><input class="form-control" type="text" name="option_key[]"></div><div class="col-md-4"><div class="formRight"><select name="type[]" class="form-control"><option value="text">Text</option><option value="textarea">Textarea</option><option value="image">Image</option></select></div></div><div class="col-md-2"><a class="btn btn-danger btn-rounded mb-10" href="" onclick="return removeField('+id+')"><i class="fa fa-trash"></i></a></div>');
			}

			function removeField(id) {
				$('.'+id).remove();
				return false;
			}
	</script>
@endpush
