@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Product</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">product</a>
		            </li>
		            <li>
		                <a href="">add new product</a>
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
			<form action="{{ route('admin.product.store') }}" method="POST">
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
	                            <label for="exampleInputName">Name</label>
	                            <input type="text" class="form-control" name="name" placeholder="Enter name post" value="{{ old('name') }}">
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
	                        <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
	                            <label for="exampleInputParent">Category</label>
	                            <select name="category_id" class="form-control mb-10">
                                    <option value=""> -- Choose category -- </option>
                                    @if( $categories )
                                    	@foreach( $categories as $id => $name )
                                    		<option value="{{ $id }}"> {{ $name }} </option>
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
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font"><strong>SEO </strong>Form</h1>
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
	                        <div class="form-group">
	                            <label for="exampleInputTitle">Title</label>
	                            <input type="text" class="form-control" name="set_title" placeholder="Change category default title" value="{{ old('set_title') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputKeywords">Keywords</label>
	                            <input type="text" class="form-control" name="meta_key" placeholder="Keywords" value="{{ old('meta_key') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputDescription">Description</label>
	                            <input type="text" class="form-control" name="meta_desc" placeholder="Description" value="{{ old('meta_desc') }}">
	                        </div>
		                </div>
		            </section>
		        </div>

		        <div class="col-md-6">
		            <section class="tile">
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font"><strong>Product </strong>information</h1>
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
	                        <div class="form-group row col-md-12">
		                		<div class="col-md-4">
			                		<label class="checkbox checkbox-custom-alt">
	                                    <input type="checkbox" id="guarantee"><i></i> Guarantee
	                                </label>
		                		</div>
		                		<div class="col-md-8 input-group" id="input-guarantee">
		                			<input type="text" class="form-control" name="guarantee" placeholder="Guarantee " value="{{ old('guarantee') }}">
		                			<span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Month</button>
                                    </span>
		                		</div>
	                        </div>
	                        <div class="form-group">
		                        <label>Number</label>
	                					<input type="number" class="form-control" name="numbers" placeholder="number product" value="{{ old('number') }}" min="0">
	                        </div>

	                        <div class="form-group">
	                        	<label class="checkbox checkbox-custom-alt">
                                    <input type="checkbox" name="high_light" value="1"><i></i> High light
                                </label>
	                        </div>

		                	<div class="clearfix"></div>
		                </div>
		            </section>
		        </div>
		        <div class="col-md-6">
		            <section class="tile">
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font"><strong>Product </strong>price</h1>
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
	                        <div class="form-group">
		                        <label for="exampleInputSlug">Price market</label>
		                        <div class="input-group {{ $errors->has('price_market') ? ' has-error' : '' }}">
		                            <input type="text" class="form-control" name="price_market" placeholder="Price market" value="{{ old('price_market') }}">
		                			<span class="input-group-btn">
                                        <button class="btn btn-default" type="button">VNĐ</button>
                                    </span>
	                                @if( $errors->has('price_market') )
		                        		<span class="help-block mb-0">
		                        			{{ $errors->first('price_market') }}
		                        		</span>
		                        	@endif
		                        </div>
		                	</div>

		                	<div>
		                		<label class="checkbox checkbox-custom-alt" style="margin-top:30px;">
                                    <input type="checkbox" name="sale" id="sale-price"><i></i> Sale price
                                </label>
		                	</div>

		                	<div id="show-sale" class="col-md-12">
                                <div class="col-md-10">
		                            <input type="text" class="form-control" name="price" placeholder="Price " value="{{ old('price') }}">
		                			<span class="input-group-btn">
                                    </span>
		                        </div>
			                	<div class="col-md-2">
	            					<a class="btn btn-info mb-10 btn-rounded" href="" onclick="return loadSalePrice()" data-container="body" data-toggle="popover" data-placement="top" data-content="Add different price for product." data-trigger="hover"><i class="fa fa-plus"></i>
	            					</a>
			                	</div>
		                	</div>
		                	<div class="clearfix"></div>
		                	<div class="different-sale" id="load-sale-price" style="margin-top: 20px;"></div>
		                	<div class="clearfix"></div>
		                </div>
		            </section>
		        </div>
		        <div class="col-md-12">
		        	<section class="tile">
		                <div class="tile-body">
		                	<div class="form-group col-md-12" style="margin-top: 15px;">
		                		<div class="col-md-8 input-group">
		                			<input id="thumbnail" class="form-control" type="text" name="image" placeholder="Image Product">
		                			<span class="input-group-btn">
		                				<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
								          <i class="fa fa-picture-o"></i>
								        </a>
	                                </span>
		                		</div>
	                        </div>
	                        <div class="clearfix"></div>

		                	<div class="form-group col-md-12">
	            				<div class="col-md-8 input-group" style="float:left;">
	            					<input id="thumbnail-photo-0" class="form-control" type="text" name="photo[]">

		                			<span class="input-group-btn">
			                			<a id="0" data-input="thumbnail-photo-0" data-preview="holder" class="photo btn btn-primary" onclick="return fileManager(0)">
	                						<i class="fa fa-picture-o"></i>
	                					</a>
	                                </span>
	            				</div>
	            				<div class="col-md-2">
	            					<a class="btn btn-info mb-10 btn-rounded" href="#0" onclick="return loadField()"><i class="fa fa-plus"></i></a>
	            				</div>
	                        </div>
	                        <div id="record"></div>
	                        <div class="clearfix"></div>
			                <div class="col-md-6 col-md-offset-3">
			                	<img id="holder" style="width: 100%;">
			                </div>

			                <div class="clearfix"></div>

		                    <div class="form-group">
		                        <label for="exampleInputParent">Content</label>
		                        <textarea name="content" class="form-control mb-10" id="newscontent">{{ old('content') }}</textarea>
                                @if( $errors->has('content') )
	                        		<span class="help-block mb-0">
	                        			{{ $errors->first('content') }}
	                        		</span>
	                        	@endif
		                    </div>
	                        <button type="submit" class="btn btn-rounded btn-primary btn-sm">Save</button>
		                </div>
		            </section>
		        </div>
		    </form>
	    </div>
	</div>
@endsection

@push('css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<style type="text/css">
		.remove-price {
		    border: 1px solid #e5e5e5;
		    border-radius: 112px;
		    width: 22px;
		    text-align: center;
		    background: #CCC;
		    position: relative;
		    top: -43px;
		    left: 183px;
		}
		label {
			font-weight: bold;
		}
	</style>
@endpush

@push('scripts')
	<script src="/vendor/tinymce/tinymce.min.js"></script>
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#show-sale').hide();
			$('#input-guarantee input').attr('disabled', true);
			$( "input[name=sale]" ).on( "click", function () {
				if($('input[name=sale]:checked').length == 1) {
					$('#show-sale').show(250);
				} else {
					$('#show-sale').hide(250);
				}
			});
			$( "#guarantee" ).on( "click", function () {
				if($('#guarantee:checked').length == 1) {
					$('#input-guarantee input').attr('disabled', false);
				} else {
					$('#input-guarantee input').attr('disabled', true);
				}
			});
		});
	</script>

	<script type="text/javascript">
	  	$(".price-tag").select2({
		  tags: true
		})
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
	<script>
		$('#lfm').filemanager('image');

		function fileManager(id) {
			$('#'+id).filemanager('image');
		}

		function loadField() {
			var id = 1 + Math.floor(Math.random() * 3600);
			$('#record').append('<div class="col-md-12 form-group '+id+'"><div class="col-md-8 input-group" style="float:left;"><input id="thumbnail-photo-'+id+'" class="form-control" type="text" name="photo[]"><span class="input-group-btn"><a id="'+id+'" data-input="thumbnail-photo-'+id+'" data-preview="holder" class="photo btn btn-primary" onclick="return fileManager('+id+')"><i class="fa fa-picture-o"></i></a></span></div><div class="col-md-2"><a class="btn btn-danger btn-rounded mb-10" href="#0" onclick="return removeField('+id+')"><i class="fa fa-trash"></i></a></div>');
		}

		function loadSalePrice() {
			var id = 1 + Math.floor(Math.random() * 3600);
			$('#load-sale-price').append('<div class="form-group col-md-6" id="price-'+id+'"><input class="form-control" type="text" name="price_different[]" placeholder="Insert different price..."><div class="remove remove-price"><a role="button" tabindex="0" class="tile-close" onclick="return removePrice('+id+');"><i class="fa fa-times"></i></a></div></div>');
			return false;
		}

		function removeField(id) {
			$('.'+id).remove();
		}

		function removePrice(id) {
			$('#price-'+id).remove();
		}
	</script>
@endpush
