@extends('administrator.layouts.master')

@section('content')
	<div class="page page-gallery">
		<div class="pageheader">
		    <h2>Categories</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">Slider</a>
		            </li>
		        </ul>

		    </div>
		</div>

		<section class="tile">
	       	@include('administrator.partials.flash')
	        <div class="tile-header dvd dvd-btm">
	            <h1 class="custom-font"><strong>Các hình ảnh</strong></h1>
	            <ul class="controls">
	                <li>
	                    <a role="button" tabindex="0" href="{{ route('admin.slider.create') }}"><i class="fa fa-plus mr-5"></i> Thêm hình ảnh</a>
	                </li>
	            </ul>
	        </div>
	        <!-- /tile header -->

	        <!-- tile body -->
	        <div class="tile-body">
	            <div class="table-responsive">
	                <table class="table table-custom" id="editable-usage">
	                    <thead>
	                    <tr>
													<th>Mã hiển thị</th>
	                        <th>Tên</th>
	                        <th>Mô ả</th>
	                        <th width="250">Hình ảnh</th>
	                        <th>Hiển thị</th>
	                        <th style="width: 160px;" class="no-sort">Hành động</th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                    @if( $images )
	                    	@foreach( $images as $i )
		                    <tr class="odd gradeX">
		                        <td>{{ $i->key }}</td>
		                        <td>{{ $i->title }}</td>
		                        <td>{{ $i->desc }}</td>
		                        <td><img src="{{ asset($i->image) }}" alt="{{ $i->key }}" style="width:90%"/></td>
		                        <td>
		                        	<div class="onoffswitch labeled blue inline-block">
                                  <input type="checkbox" name="publish" slider-id={{ $i->id }} class="onoffswitch-checkbox" id="switch{{ $i->id }}" {{ ($i->publish == 0) ? 'checked' : '' }}>
                                  <label class="onoffswitch-label" for="switch{{ $i->id }}">
                                      <span class="onoffswitch-inner"></span>
                                      <span class="onoffswitch-switch"></span>
                                  </label>
                              </div>
		                        </td>
		                        <td class="actions">
		                        	<form action="{{ route('admin.slider.destroy', $i->id) }}" method="POST">
		                        		{{ method_field('DELETE') }}
		                        		{{ csrf_field() }}
			                        	<a href="{{ route('admin.slider.edit', $i->id) }}" role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Sửa</a>
			                        	<button role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10" onclick="return confirm('Are you ready!');">Xóa</button>
		                        	</form>
		                        </td>
		                    </tr>
		                    @endforeach
		                @endif
	                    </tbody>
	                </table>
	            </div>
	        </div>
	        <!-- /tile body -->
	        <div id='noti' style='display:none'></div>
	    </section>
	</div>
	<div id='result' style='display:none'></div>
@endsection

@push('css')
	<link rel="stylesheet" href="/assets/admin/js/vendor/magnific-popup/magnific-popup.css">
	<style type="text/css" media="screen">
		#result {
		    width:300px;
		    height:20px;
		    height:auto;
		    position:absolute;
		    left:50%;
		    margin-left:-100px;
		    top:10px;
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
	</style>
@endpush

@push('scripts')
    <script src="/assets/admin/js/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script src="/assets/admin/js/vendor/mixitup/jquery.mixitup.min.js"></script>

    <script>
        $(window).load(function(){
            $('.mix-grid').mixItUp();
            $('.mix-controls .select-all input').change(function(){
                if($(this).is(":checked")) {
                    $('.gallery').find('.mix').addClass('selected');
                    enableGalleryTools(true);
                } else {
                    $('.gallery').find('.mix').removeClass('selected');
                    enableGalleryTools(false);
                }
            });

            $('.mix .img-select').click(function(){
                var mix = $(this).parents('.mix');
                if(mix.hasClass('selected')) {
                    mix.removeClass('selected');
                    enableGalleryTools(false);
                } else {
                    mix.addClass('selected');
                    enableGalleryTools(true);
                }
            });

            var enableGalleryTools = function(enable) {
                if (enable) {
                    $('.mix-controls li.mix-control').removeClass('disabled');
                } else {
                    var selected = false;
                    $('.gallery .mix').each(function(){
                        if($(this).hasClass('selected')) {
                            selected = true;
                        }
                    });
                    if(!selected) {
                        $('.mix-controls li.mix-control').addClass('disabled');
                    }
                }
            }
        });
    </script>

	<script>
        $(document).ready(function() {
        	$('input[name=publish]').change(function(event) {
        		var slider_id;
        		slider_id = $(this).parent().find('input[name=publish]').attr('slider-id');
        		var data;
						id = $('#switch'+slider_id+':checked');
						if(id.length == 1) {
							data = 0;
						} else {
							data = 1;
						}

        		$.ajax({
        			url: '{{ route("admin.slider.publish") }}',
        			method: 'POST',
        			data: { 'publish': data, 'id': slider_id, '_token': $('meta[name="csrf-token"]').attr('content') },
        			success: function (result) {
        				$('#result').html(result);
        				$('#result').fadeIn(400).delay(3000).fadeOut(400);
					}
        		});
        	});
        });
	</script>
@endpush
