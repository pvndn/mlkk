@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Chi tiết đơn hàng</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">Đơn đặt hàng</a>
		            </li>
		            <li>
		                <a href="">xem</a>
		            </li>
		        </ul>

		        <div class="page-toolbar">
		            <a role="button" tabindex="0" class="btn btn-lightred no-border pickDate">
		                <i class="fa fa-calendar"></i>&nbsp;&nbsp;<span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
		            </a>
		        </div>

		    </div>
		</div>

		<section class="tile">
	       	@include('administrator.partials.flash')
	        <div class="tile-header dvd dvd-btm">
	            <h1 class="custom-font"><strong>Thông tin đơn hàng</strong> <span style="font-size: 13px;">( {{ $transaction->created_at }} )</span></h1>
	            <ul class="controls">
	                <li>
	                    <a role="button" tabindex="0" href="{{ route('admin.product.create') }}"><i class="fa fa-plus mr-5"></i> Add news product</a>
	                </li>
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
	        <!-- /tile header -->

	        <!-- tile body -->
	        <div class="tile-body" id="printer">
	        	<div class="col-md-10 col-md-offset-1">
		        	<div class="row">
								<?php
									if($transaction->status == 1) {
										$type = 'btn-success';
										$messages = 'Đơn hàng đã được xác nhận thanh toán từ ( '. $transaction->updated_at .' ). Bạn có thể xuất hóa đơn này.';
									} elseif($transaction->status == 2) {
											$type = 'btn-warning';
											$messages = 'Đơn hàng đã bị hủy. Bạn không thể thực hiện được thao tác nào với đơn hàng này.';
									}
									else {
										$type = null;
										$messages = '';
									}
								?>
								<div class="message btn {{ $type }}" id="hide">
									{{ $messages }}
								</div>
								<div class="widget">
									<table class="table-order">
										<thead>
											<tr>
												<td>Mã đơn hàng</td>
												<td>Tên</td>
												<td>Email</td>
												<td>Số ĐT</td>
												<td>Địa chỉ gửi hàng</td>
											</tr>
										</thead>
											<tbody>
											@if( $orders )
												<tr>
														<td> {{ $transaction->id }} </td>
														<td> {{ $transaction->name }} </td>
														<td> {{ $transaction->email }} </td>
														<td> {{ $transaction->phone }} </td>
														<td> {{ $transaction->address }} </td>
												</tr>
											@endif
											</tbody>
									</table>
								</div>
		        	</div>
		        	<div class="row">
								<div class="widget">
									<table class="table-order">
											<tbody>
											@if( $orders )
												@foreach( $orders as $o )
												<?php
													if($o->products->price != 0) {
														$price = number_format($o->products->price).'<sup>đ</sup>';
														$price_root = number_format($o->products->price_market).'<sup>đ</sup>';
													} else {
														$price = number_format($o->products->price_market).'<sup>đ</sup>';
													}
												?>
												<tr>
														<td><img src="{{ url($o->products->image) }}" width="60" height="60" /></td>
														<td> {{ $o->products->name }} </td>
														<td> {{ $o->qty }} </td>
														<td> {!! ($price_root) ? '<span class="unlink btn">'.$price_root.'</span><span class="price btn btn-default">'.$price.'</span>' : '<span class=price>'.$price.'</span>' !!} </td>
												</tr>
												@endforeach
												<tr>
													<td colspan="3">Tổng tiền</td>
													<td>{{ number_format($transaction->amount) }} <sup>đ</sup></td>
												</tr>
											@endif
											</tbody>
									</table>
								</div>
		        	</div>
	        	</div>
			    <div class="clearfix"></div>
			    <div class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
						@if($transaction->status != 2)
							@if($transaction->status != 1)
							<div class="col-md-3">
								<form class="" action="{{ route('admin.orders.remove', $transaction->id) }}" method="post">
									{{ method_field('PUT') }}
									{{ csrf_field() }}
									<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">Hủy đơn hàng</button>
								</form>
							</div>
							<div class="col-md-3">
								<form class="" action="{{ route('admin.orders.pay', $transaction->id) }}" method="post">
									{{ method_field('PUT') }}
									{{ csrf_field() }}
									<button class="btn btn-primary" onclick="return confirm('Hãy chắc chắn rằng đơn hàng này đã được thanh toán?');">Xác nhận thanh toán</button>
								</form>
							</div>



					    <a href="" class="btn btn-"></a>
							@endif
							@if($transaction->status == 0)
					    <a href="" class="btn btn-warning">Sửa đơn hàng</a>
							@endif
							@if($transaction->status == 1)
					    <button class="btn btn-success print-link no-print">In hóa đơn</button>
							@endif
						@endif
				    <a href="{{ route('admin.orders.index') }}" class="btn btn-default hide_ex">Quay lại</a>
			    </div>
			    <div class="clearfix"></div>
	        </div>
	        <!-- /tile body -->
	    </section>
	</div>
@endsection

@push('css')
<style type="text/css" media="screen">
	.widget {
    background: #f9f9f9;
    border: 1px solid #cdcdcd;
    margin-top: 10px;
    clear: both;
		box-shadow: 0 1px 0 #fff;
		-moz-box-shadow: 0 1px 0 #fff;
		-webkit-box-shadow: 0 1px 0 #fff;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
		-khtml-border-radius: 3px;
		border-radius: 3px;
	}

	table.table-order thead td:first-child {
	    border-left: none;
	}

	table.table-order thead td {
	    border-bottom: 1px solid #cbcbcb;
	    border-left: 1px solid #cbcbcb;
	    color: #878787;
	    font-size: 13px;
	    color: #878787;
	    font-weight: normal;
	    padding: 3px 8px 2px 8px;
	}
	table.table-order thead td {
	    text-align: center;
	}

	table.table-order {
	  border-collapse: collapse;
    width: 100%;
	}

	table.table-order tr {
	  border-top: 1px solid #e4e4e4;
	}

	table.table-order tr:first-child {
    border-top: none;
	}

	table.table-order td:first-child {
    border-left: none;
	}
	table.table-order td {
	    border-left: 1px solid #e4e4e4;
	    padding: 8px;
	    vertical-align: middle;
	}
	table.table-order td {
	    text-align: center;
	}
	table.table-order td {
	    text-align: center;
	}
	.unlink {
		text-decoration: line-through;
		color: red;
	}
	.message {
		border-radius: 3px;
	}
</style>
@endpush

@push('scripts')
	<script type='text/javascript' src='/assets/admin/js/jQuery.print.js'></script>

	<script type="text/javascript">
		var table = $('#editable-usage');

        var oTable = $('#editable-usage').DataTable({
            "sort": false
        });
	</script>
	<script type="text/javascript">
		$(function () {
			$("#printer").find('.print-link').on('click', function() {
					$("#printer").print({
							globalStyles : true,
							mediaPrint : true,
							stylesheet : "{{ asset('assets/admin/css/export.css') }}",
							title: 'Công ty TNHH Phát triển Công nghệ & Dịch vụ HSVN Toàn Cầu',
					});
			});
		});
	</script>
@endpush
