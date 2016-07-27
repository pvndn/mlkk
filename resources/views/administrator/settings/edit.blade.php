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
			<form class="form" id="form" action="{{ route('admin.settings.update', $setting->id) }}" method="post" enctype="multipart/form-data">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<section class="tile">
					<div class="tile-header dvd dvd-btm">
              <h1 class="custom-font"><strong>Main </strong>Form</h1>
          </div>
					<fieldset>
						<div class="tile-body">
							<div class="form-group">
                  <label for="ky" class="col-sm-2 control-label labels">
										@if(Auth::check())
												@if(Auth::guard('web_users')->user()->role == 1)
												<input type="text" name="option_key" class="form-control" id="name" placeholder="Nhập giá trị" value="{{ $setting->option_key }}">
												@else
												{{ $setting->option_key }}
												@endif
										@endif
									</label>
                  <div class="col-sm-6">

										@if($setting->type == 'text')
                      <input type="text" name="option_value" class="form-control" id="name" placeholder="Nhập giá trị" value="{{ $setting->option_value }}">
										@elseif($setting->type == 'textarea')
											<textarea name="option_value" rows="8" cols="40">{{ $setting->option_value }}</textarea>
										@elseif($setting->type == 'editor')
											<textarea name="option_value" rows="8" cols="40" id="newscontent">{{ $setting->option_value }}</textarea>
										@else
											<div class="form-group input-group">
													<input id="thumbnail" class="form-control" type="text" name="option_value" value="{{ $setting->option_value }}">
													<span class="input-group-btn">
															<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
																<i class="fa fa-picture-o"></i>
															</a>
													</span>
											</div>
											<div class="col-md-6 col-md-offset-3">
													<img id="holder" style="width: 100%;">
											</div>
										@endif
                  </div>
									@if(Auth::check())
											@if(Auth::guard('web_users')->user()->role == 1)
									<div class="col-md-4 {{ $errors->has('format') ? ' has-error' : '' }}">
										<div class="formRight">
											<select name="type" class="form-control">
												<option value="text" {{ $setting->type == 'text' ? 'selected=selected' : '' }}>Text</option>
												<option value="textarea" {{ $setting->type == 'textarea' ? 'selected=selected' : '' }}>Textarea</option>
												<option value="image" {{ $setting->type == 'image' ? 'selected=selected' : '' }}>Image</option>
												<option value="editor" {{ $setting->type == 'editor' ? 'selected=selected' : '' }}>Wysiwyg editor</option>
											</select>
											@if( $errors->has('format') )
												<span class="help-block mb-0">
													{{ $errors->first('format') }}
												</span>
											@endif
										</div>
									</div>
									@endif
								@endif
									<div class=" clearfix"></div>
              </div>




			    		<div class="formSubmit" align="center" style="margin-top: 15px;">
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
	.labels {
    line-height: 30px;
    font-weight: bold;
		text-align: center;
	}
</style>
@endpush

@push('scripts')
	<script src="/vendor/tinymce/tinymce.min.js"></script>
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script>
		$('#lfm').filemanager('image');
		$('#lfm-footer').filemanager('image');
	</script>

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
