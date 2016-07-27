@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Đối tác</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">đối tác</a>
		            </li>
		            <li>
		                <a href="">cập nhật</a>
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
	       	@include('administrator.partials.flash')
			<form action="{{ route('admin.partner.update', $partner->id) }}" method="POST">
				{{ method_field('PUT') }}
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
	                            <label for="exampleInputName">Tên dự án</label>
	                            <input type="text" class="form-control" name="name" placeholder="Enter name page" value="{{ old('name', $partner ? $partner->name : '') }}">
	                        	@if( $errors->has('name') )
	                        		<span class="help-block mb-0">
	                        			{{ $errors->first('name') }}
	                        		</span>
	                        	@endif
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputSlug">Slug</label>
	                            <input type="text" class="form-control" name="slug" placeholder="your-slug" value="{{ old('slug', $partner ? $partner->slug : '') }}">
	                        </div>
													<div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
	                            <label for="exampleInputParent">Danh mục</label>
	                            <select name="category_id" class="form-control mb-10">
                                    <option value=""> -- Chọn danh mục -- </option>
                                    @if( $categories )
                                    	@foreach( $categories as $v)
                                    		<option value="{{ $v->id }}" {{ $v->id == $partner->category_id ? 'selected=selected' : '' }}> {{ $v->name }} </option>
                                    	@endforeach
                                    @endif
                                </select>
																@if( $errors->has('category_id') )
																	<span class="help-block mb-0">
																		{{ $errors->first('category_id') }}
																	</span>
																@endif
	                        </div>
		                	<div class="clearfix"></div>
		                </div>
		            </section>
		        </div>
		        <div class="col-md-6">
		        	<section class="tile">
		                <div class="tile-body">
											<div class="input-group">
												<input id="thumbnail" class="form-control" value="{{ $partner->logo }}" type="text" name="logo" placeholder="Logo đối tác">
												<span class="input-group-btn">
													<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
														<i class="fa fa-picture-o"></i>
													</a>
												</span>
											</div>

			                <div class="col-md-6 col-md-offset-3">
			                	<img id="holder" style="width: 100%;" src="{{ asset($partner->logo) }}">
			                </div>

			                <div class="clearfix"></div>

											<div class="form-group">
													<label for="exampleInputSlug">Website (Link)</label>
													<input type="url" class="form-control" name="link" placeholder="Website đối tác" value="{{ old('link', $partner->link ? $partner->link : '') }}">
											</div>

											<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
													<label for="exampleInputParent">Mô tả đối tác</label>
													<input type="text" class="form-control" name="desc" placeholder="Giới thiệu đối tác" value="{{ old('desc', $partner->desc ? $partner->desc : '' ) }}">
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
	  var editor_config = {
	    path_absolute : "/",
	    selector: "#newscontent",
	    height : 300,
	    entity_encoding : "raw",
	    plugins: [
	      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
	      "searchreplace wordcount visualblocks visualchars code fullscreen",
	      "insertdatetime media nonbreaking save table contextmenu directionality",
	      "emoticons template paste textcolor colorpicker textpattern"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
	    relative_urls: false,
	    setup : function(ed)
		{
		    ed.on('init', function()
		    {
		        this.getDoc().body.style.fontSize = '16px';
		    });
		},
	    file_browser_callback : function(field_name, url, type, win) {
	      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
	      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

	      var cmsURL = editor_config.path_absolute + 'laravel-filemanager/admin/file?field_name=' + field_name;
	      if (type == 'image') {
	        cmsURL = cmsURL + "&type=Images";
	      } else {
	        cmsURL = cmsURL + "&type=Files";
	      }

	      tinyMCE.activeEditor.windowManager.open({
	        file : cmsURL,
	        title : 'Filemanager',
	        width : x * 0.8,
	        height : y * 0.8,
	        resizable : "yes",
	        close_previous : "no"
	      });
	    }
	  };

	  tinymce.init(editor_config);
	</script>
	<script>
		$('#lfm').filemanager('image');
	</script>
@endpush
