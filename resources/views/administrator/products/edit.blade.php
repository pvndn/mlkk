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
		                <a href="">edit product</a>
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
			<form action="{{ route('admin.product.update', $product->id) }}" method="POST">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
		        <div class="col-md-6">
		            <section class="tile">
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font">Thông tin sản phẩm</h1>
		                </div>
		                <div class="tile-body">
	                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
	                            <label for="exampleInputName">Tên sản phẩm</label>
	                            <input type="text" class="form-control" name="name" placeholder="Enter name product" value="{{ old('name', $product ? $product->name : '') }}">
	                        	@if( $errors->has('name') )
	                        		<span class="help-block mb-0">
	                        			{{ $errors->first('name') }}
	                        		</span>
	                        	@endif
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputSlug">Slug</label>
	                            <input type="text" class="form-control" name="slug" placeholder="your-slug" value="{{ old('slug', $product ? $product->slug : '') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputParent">Danh mục</label>
	                            <select name="category_id" class="form-control mb-10">
                                    <option value=""> -- Chọn danh mục sản phẩm -- </option>
                                    @if( $categories )
                                    	@foreach( $categories as $id => $name )
                                    		<option value="{{ $id }}" {{ $product->category->id == $id ? 'selected=selected' : '' }}> {{ $name }} </option>
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
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font">Thông tin bảo hành, số lượng</h1>
		                </div>
		                <div class="tile-body">
	                        <div class="form-group">
	                            <label for="exampleInputTitle">Title</label>
	                            <input type="text" class="form-control" name="set_title" placeholder="Change category default title" value="{{ old('set_title', $product ? $product->set_title : '') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputKeywords">Keywords</label>
	                            <input type="text" class="form-control" name="meta_key" placeholder="Keywords" value="{{ old('meta_key', $product ? $product->meta_key : '') }}">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputDescription">Description</label>
	                            <input type="text" class="form-control" name="meta_desc" placeholder="Description" value="{{ old('meta_desc', $product ? $product->meta_desc : '') }}">
	                        </div>
		                </div>
		            </section>
		        </div>

		        <div class="col-md-6">
		            <section class="tile">
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font">Thông tin bảo hành, số lượng</h1>
		                </div>
		                <div class="tile-body">
	                    <div class="form-group row col-md-12">
		                		<div class="col-md-4 row">
			                		<label class="checkbox checkbox-custom-alt">
                              <input type="checkbox" id="guarantee" {{ $product->guarantee != '' ? 'checked' : '' }}><i></i> Bảo hành
                          </label>
		                		</div>
		                		<div class="col-md-8 input-group" id="input-guarantee">
		                			<input type="text" class="form-control" name="guarantee" placeholder="Bảo hành / tháng " value="{{ old('guarantee', $product->guarantee != '' ? $product->guarantee : 0) }}">
		                			<span class="input-group-btn">
                              <button class="btn btn-default" type="button">Tháng</button>
                          </span>
		                		</div>
	                        </div>
	                        <div class="form-group">
		                        <label>Số lượng sản phẩm</label>
	                					<input type="number" class="form-control" name="numbers" placeholder="Số lượng sản phẩm" value="{{ old('numbers', $product ? $product->numbers : '') }}" min="0">
	                        </div>

	                        <div class="form-group">
	                        	<label class="checkbox checkbox-custom-alt">
                                    <input type="checkbox" name="high_light" value="1" {{ $product->high_light == 1 ? "checked" : '' }}><i></i> Nổi bật (Đánh dấu nếu chọn nổi bật sản phẩm)
                                </label>
	                        </div>

		                	<div class="clearfix"></div>
		                </div>
		            </section>
		        </div>
		        <div class="col-md-6">
		            <section class="tile">
		                <div class="tile-header dvd dvd-btm">
		                    <h1 class="custom-font">Giá tiền sản phẩm</h1>
		                </div>
		                <div class="tile-body">
	                        <div class="form-group">
		                        <label for="exampleInputSlug">Giá bán thị trường</label>
		                        <div class="input-group {{ $errors->has('price_market') ? ' has-error' : '' }}">
		                            <input type="text" class="form-control" name="price_market" placeholder="Giá bán thị trường" value="{{ old('price_market', $product ? $product->price_market : '') }}">
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

		                	<div id="show-sale" class="">
												<label>
														Giá bán giảm giá
                            <!-- <input type="checkbox" name="sale" id="sale-price"><i></i>  -->
                        </label>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="price" placeholder="Price " value="{{ old('price', $product ? $product->price : '') }}">
                        		<span class="input-group-btn">
                                <button class="btn btn-default" type="button">VNĐ</button>
                            </span>
                        </div>

												<div class="form-group">
													<label>Thông tin khuyến mãi</label>
													<textarea name="desc" rows="8" cols="40" class="form-control">{{ old('desc', $product ? $product->desc : '') }}</textarea>
												</div>
			                	<!-- <div class="col-md-2">
	            					<a class="btn btn-info mb-10 btn-rounded" href="" onclick="return loadSalePrice()" data-container="body" data-toggle="popover" data-placement="top" data-content="Add different price for product." data-trigger="hover"><i class="fa fa-plus"></i>
	            					</a>
			                	</div> -->
		                	</div>
		                	<div class="clearfix"></div>
		                </div>
		            </section>
		        </div>
		        <div class="col-md-12">
		        	<section class="tile">
		                <div class="tile-body">
		                	<div class="col-md-6">
			                	<div class="form-group input-group">
												    <input id="thumbnail" class="form-control" type="text" name="image" value="{{ old('image', $product ? $product->image : '') }}">
														<span class="input-group-btn">
												        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
												          <i class="fa fa-picture-o"></i>
												        </a>
												    </span>
													</div>
					                <div class="col-md-6 col-md-offset-3">
					                	<img id="holder" style="width: 100%;" src="{{ $product->image }}">
					                </div>
		                	</div>
		                	<div class="col-md-6">
		                		@if(!empty($product->albums))
			                    <ul id="myGallery">
			                    	@foreach($product->albums as $album)
			                        	<li id="{{ $album->id }}">
			                        		<div>
			                        			<img src="{{ $album->photo }}" />
			                        		</div>
			                				<div style="text-align: center; padding: 5px;">
			                					<a class="btn btn-danger btn-rounded mb-10" href="#0" onclick="return removeRecord({{ $album->id }})">
			                						<i class="fa fa-trash"></i>
			                					</a>
			                				</div>
			                        	</li>
			                        @endforeach
			                    </ul>
						        @endif
			                	<div class="clearfix"></div>
                				<div>
                					<a href="#0" class="btn btn-primary btn-rounded-10 btn-ef btn-ef-3 btn-ef-3b mb-10" onclick="return loadField()">
                						<i class="fa fa-plus"></i> Thêm hình ảnh
                					</a>
                				</div>
			                	<div class="clearfix"></div>
                				<div id="record"></div>
		                	</div>
			                <div class="clearfix"></div>


			                <div class="clearfix"></div>

		                    <div class="form-group">
		                        <label for="exampleInputParent">Mô tả sản phẩm</label>
		                        <textarea name="content" class="form-control mb-10" id="newscontent">{{ old('content', $product ? $product->content : '') }}</textarea>
		                    </div>
	                        <button type="submit" class="btn btn-rounded btn-primary btn-sm">Lưu</button>
		                </div>
		            </section>
		        </div>
		    </form>
	    </div>
	</div>
	<div id='noti' style='display:none'></div>
@endsection

@push('css')
<link rel="stylesheet" href="/assets/admin/css/thumbnail-slider.css" type="text/css">
<style type="text/css" media="screen">
	#noti {
	    width:300px;
	    height:auto;
	    position:absolute;
	    right:35px;
	    margin-left:-100px;
	    top:725px;
	    background-color: #383838;
	    color: #F0F0F0;
	    font-family: Calibri;
	    font-size: 20px;
	    padding:10px;
	    text-align:center;
	    border-radius: 2px;
	    -webkit-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
	    -moz-box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
	    box-shadow: 0px 0px 24px -1px rgba(56, 56, 56, 1);
	}
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
</style>
@endpush

@push('scripts')
	<script src="/vendor/tinymce/tinymce.min.js"></script>
	<script src="/vendor/laravel-filemanager/js/lfm.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$( "#guarantee" ).on( "click", function () {
				if($('#guarantee:checked').length == 1) {
					$('#input-guarantee input').attr('disabled', false);
				} else {
					$('#input-guarantee input').attr('disabled', true);
				}
			});
		});
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
			$('#record').append('<div class="form-group '+id+'"><div class="row"><div class="col-md-4"><a id="'+id+'" data-input="thumbnail-photo-'+id+'" data-preview="holder" class="photo btn btn-primary" onclick="return fileManager('+id+')"><i class="fa fa-picture-o"></i> Insert image </a></div><div class="col-md-6"><input id="thumbnail-photo-'+id+'" class="form-control" type="text" name="photo[]"></div><div class="col-md-2"><a class="btn btn-danger btn-rounded mb-10" href="#0" onclick="return removeField('+id+')"><i class="fa fa-trash"></i></a></div></div></div>')
		}

		function removeField(id) {
			$('.'+id).remove();
		}

		function removeRecord(id) {
			if(confirm('are you ready!') == true) {
				var url = "{{ route('admin.product.album') }}";
				var _token = "{{ csrf_token() }}";
				$.ajax({
					url: url + '/' + id,
					method: 'DELETE',
					data: { '_token': _token, 'id': id  },
					success: function (result) {
						$('#'+id).remove();
						$('#noti').html(result);
	        			$('#noti').slideDown(400).delay(3000).fadeOut(400);
					}
				});
			}
		}

		function loadSalePrice() {
			var id = 1 + Math.floor(Math.random() * 3600);
			$('#load-sale-price').append('<div class="form-group col-md-6" id="price-'+id+'"><input class="form-control" type="text" name="price_different[]" placeholder="Insert different price..."><div class="remove remove-price"><a role="button" tabindex="0" class="tile-close" onclick="return removePrice('+id+');"><i class="fa fa-times"></i></a></div></div>');
			return false;
		}

		function removePrice(id) {
			$('#price-'+id).remove();
		}
	</script>
@endpush
