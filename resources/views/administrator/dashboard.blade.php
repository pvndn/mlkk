@extends('administrator.layouts.master')
@section('content')
	<div class="page page-dashboard">

		<div class="pageheader">

		    <h2>Trang chủ <span></span></h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href=""><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">Trang chủ</a>
		            </li>
		        </ul>
		    </div>

		</div>

		<!-- cards row -->
		<div class="row">

		    <!-- col -->
		    <div class="card-container col-lg-4 col-sm-4 col-sm-12">
		        <div class="card">
		            <div class="front bg-greensea">

		                <!-- row -->
		                <div class="row">
		                    <!-- col -->
		                    <div class="col-xs-4">
		                        <i class="fa fa-shopping-cart fa-4x"></i>
		                    </div>
		                    <!-- /col -->
		                    <!-- col -->
		                    <div class="col-xs-8">
		                        <p class="text-elg text-strong mb-0">{{ \App\Models\Product::count() }}</p>
		                        <span>Sản phẩm</span>
		                    </div>
		                    <!-- /col -->
		                </div>
		                <!-- /row -->

		            </div>
		            <div class="back bg-greensea">
		                <div class="row">
		                    <div class="col-xs-12">
		                        <a href="{{ route('admin.product.index') }}"><i class="fa fa-ellipsis-h fa-2x"></i> Xem</a>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <!-- /col -->

		    <!-- col -->
		    <div class="card-container col-lg-4 col-sm-4 col-sm-12">
		        <div class="card">
		            <div class="front bg-lightred">

		                <!-- row -->
		                <div class="row">
		                    <!-- col -->
		                    <div class="col-xs-4">
		                        <i class="fa fa-shopping-cart fa-4x"></i>
		                    </div>
		                    <!-- /col -->
		                    <!-- col -->
		                    <div class="col-xs-8">
		                        <p class="text-elg text-strong mb-0">{{ \App\Models\Transaction::count() }}</p>
		                        <span>Đơn hàng</span>
		                    </div>
		                    <!-- /col -->
		                </div>
		                <!-- /row -->

		            </div>
		            <div class="back bg-lightred">

		                <!-- row -->
		                <div class="row">
		                    <div class="col-xs-12">
		                        <a href="{{ route('admin.orders.index') }}"><i class="fa fa-ellipsis-h fa-2x"></i> Xem</a>
		                    </div>
		                </div>
		                <!-- /row -->

		            </div>
		        </div>
		    </div>
		    <!-- /col -->

		    <!-- col -->
		    <div class="card-container col-lg-4 col-sm-4 col-sm-12">
		        <div class="card">
		            <div class="front bg-blue">

		                <!-- row -->
		                <div class="row">
		                    <!-- col -->
		                    <div class="col-xs-3">
		                        <i class="fa fa-usd fa-4x"></i>
		                    </div>
		                    <!-- /col -->
		                    <!-- col -->
		                    <div class="col-xs-9">
		                        <p class="text-elg text-strong mb-0">{{ number_format($count_money) }} <sup>vnđ</sup></p>
		                        <span>Doanh thu</span>
		                    </div>
		                    <!-- /col -->
		                </div>
		                <!-- /row -->
		            </div>
		        </div>
		    </div>
		    <!-- /col -->
		</div>
		<!-- /row -->




		<!-- row -->
		<div class="row">
		    <!-- col -->
		    <div class="col-md-12">
		        <!-- tile -->
		        <section class="tile">

		            <!-- tile header -->
		            <div class="tile-header dvd dvd-btm">
		                <h1 class="custom-font">Các đơn hàng gần đây</h1>
		            </div>
		            <!-- /tile header -->

		            <!-- tile body -->
		            <div class="tile-body table-custom">

		                <div class="table-responsive">
		                    <table class="table table-custom" id="project-progress">
		                        <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>Tên khách hàng</th>
		                            <th>E-mail</th>
		                            <th>Số điện thoại</th>
		                            <th>Tình trạng</th>
		                            <th>Số tiền</th>
		                            <th>Ngày đến</th>
		                        </tr>
		                        </thead>
		                        <tbody>
		                        @foreach(\App\Models\Transaction::orderBy('id', 'desc')->where('status', '!=', 3)->take(5)->get() as $transaction)
		                        <tr {!! $transaction->status == 1 ? 'style="background: rgba(0, 204, 0, 0.13); color: #1cc700;"' : ($transaction->status == 2 ? 'style="background: rgba(216, 0, 0, 0.17); color: #d60000;"' : '') !!}>
		                            <td><a href="{{ route('admin.orders.show', $transaction->id) }}">#{{ $transaction->id }}</a></td>
		                            <td>{{ $transaction->name }}</td>
		                            <td>{{ $transaction->email }}</td>
		                            <td>
		                                {{ $transaction->phone }}
		                            </td>
		                            <td>
		                               {!! $transaction->status == 0 ? '<span class=pending>Chờ xử lý</span>' : ($transaction->status == 1 ? '<span class=completed>Đã xử lý</span>' : '<span class=red>Đã bị hủy</span>') !!}
		                            </td>
		                            <td>{{ number_format($transaction->amount) }}</td>
		                            <td>{{ $transaction->created_at }}</td>
		                        </tr>
		                        @endforeach
		                        </tbody>
		                    </table>
		                </div>

		            </div>
		            <!-- /tile body -->

		        </section>
		        <!-- /tile -->
		    </div>
		    <!-- /col -->
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
		    <!-- col -->
		    <div class="col-md-12">
		        <!-- tile -->
		        <section class="tile">

		            <!-- tile header -->
		            <div class="tile-header dvd dvd-btm">
		                <h1 class="custom-font">Các sản phẩm được xem nhiều</h1>
		            </div>
		            <!-- /tile header -->

		            <!-- tile body -->
		            <div class="tile-body table-custom">

		                <div class="table-responsive">
		                   <div class="tile-body">
				                <table class="table table-custom" id="editable-usage">
				                    <thead>
				                    <tr>
				                        <th></th>
				                        <th>Tên</th>
				                        <th>Slug</th>
				                        <th>Giá</th>
				                    </tr>
				                    </thead>
				                    <tbody>
				                    @foreach(\App\Models\Product::orderBy('view', 'desc')->take(5)->get() as $product)
					                    <tr class="odd gradeX">
					                        <td><img src="{{ asset($product->image) }}" width="75" height="50" /></td>
					                        <td>
												<a href="{{ route('admin.product.show', $product->id) }}">{{ $product->name }}</a>
												<p>
													<span style="text-decoration: underline; font-size: 13px;">Lượt xem: </span> {{$product->view}}
												</p>
											</td>
					                        <td>{{ $product->slug }}</td>

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
					                    </tr>
					                    @endforeach
				                    </tbody>
				                </table>
				            </div>
				        </div>
		            </div>
		            <!-- /tile body -->
		        </section>
		        <!-- /tile -->
		    </div>
		    <!-- /col -->
		</div>
		<!-- /row -->

	</div>
	<style type="text/css">
		.unlink {
			text-decoration: line-through;
		}
	</style>
@stop
