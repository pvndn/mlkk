@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Sản phẩm</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">Sản phẩm</a>
		            </li>
		        </ul>

		    </div>
		</div>

		<section class="tile">
	       	@include('administrator.partials.flash')
	        <div class="tile-header dvd dvd-btm">
	            <h1 class="custom-font"> Danh sách sản phẩm</h1>
	            <ul class="controls">
	                <li>
	                    <a role="button" tabindex="0" href="{{ route('admin.product.create') }}"><i class="fa fa-plus mr-5"></i> Thêm mới sản phẩm</a>
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
	                        <th></th>
	                        <th>Tên</th>
	                        <th>Slug</th>
	                        <!-- <th>Publish</th> -->
	                        <th>Giá</th>
	                        <th style="width: 160px;" class="no-sort"></th>
	                    </tr>
	                    </thead>
	                    <tbody>
	                    @if( $products )
	                    	@foreach( $products as $product )
		                    <tr class="odd gradeX">
		                        <td><img src="{{ $product->image }}" width="75" height="50" /></td>
		                        <td>
															<a href="{{ route('admin.product.show', $product->id) }}">{{ $product->name }}</a>
															<p>
																<span style="text-decoration: underline; font-size: 13px;">Lượt xem: </span> {{$product->view}}
															</p>
														</td>
		                        <td>{{ $product->slug }}</td>
		                        <!-- <td>
		                        	<div class="onoffswitch labeled blue inline-block">
                                        <input type="checkbox" name="publish" cate-id={{ $product->id }} class="onoffswitch-checkbox" id="switch{{ $product->id }}" {{ ($product->publish == 0) ? 'checked' : '' }}>
                                        <label class="onoffswitch-label" for="switch{{ $product->id }}">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
		                        </td> -->
		                        <td>
		                        	@if($product->price != 0)
		                        		<?php $class = 'class=unlink';?>
		                        	@else
		                        		<?php $class = '';?>
		                        	@endif
		                        	<p {{ $class or '' }}>{{ number_format($product->price_market) }} vnđ</p>
		                        	@if($product->price != 0)
		                        		<p ><strong>Giá bán:</strong> {{ number_format($product->price) }} vnđ</p>
		                        	@endif

		                        </td>
		                        <td class="actions">
		                        	<form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
		                        		{{ method_field('DELETE') }}
		                        		{{ csrf_field() }}
			                        	<a href="{{ route('admin.product.edit', $product->id) }}" role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Edit</a>
			                        	<button role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10" onclick="return confirm('Are you ready!');">Remove</button>
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
@endsection

@push('css')
<style type="text/css" media="screen">
	#noti {
	    width:300px;
	    height:20px;
	    height:auto;
	    position:absolute;
	    left:60%;
	    margin-left:-100px;
	    bottom:0;
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
	.unlink {
		text-decoration: line-through;
		color: red;
	}
	.dif_pri, .unlink {
		font-size: 13px;
	}
</style>
@endpush

@push('scripts')

	<script type="text/javascript">
		var table = $('#editable-usage');

        var oTable = $('#editable-usage').DataTable({
            "sort": false
        });
	</script>

	<script>
        $(document).ready(function() {
        	$('input[name=publish]').change(function(event) {
        		var cate_id;
        		cate_id = $(this).parent().find('input[name=publish]').attr('cate-id');
        		var url = base_url;
        		var data;
        		var value = $('input[name=publish]').attr("checked") ? 1 : 0;
        		if( value == 1 ) {
        			data = 1;
        		} else {
        			data = 0;
        		}
        		$.ajax({
        			url: '{{ route("admin.product.publish") }}',
        			method: 'POST',
        			data: { 'publish': data, 'id': cate_id, '_token': $('meta[name="csrf-token"]').attr('content') },
        			success: function (result) {
        				$('#noti').html(result);
        				$('#noti').fadeIn(400).delay(3000).fadeOut(400);
					}
        		});
        	});
        });
	</script>
@endpush
