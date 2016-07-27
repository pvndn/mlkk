@extends('administrator.layouts.master')

@section('content')
	<div class="page">
		<div class="pageheader">
		    <h2>Liên hệ</h2>

		    <div class="page-bar">

		        <ul class="page-breadcrumb">
		            <li>
		                <a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
		            </li>
		            <li>
		                <a href="">hộp thư đến</a>
		            </li>
		        </ul>
		    </div>
		</div>

		<section class="tile">
	       	@include('administrator.partials.flash')
	        <div class="tile-header dvd dvd-btm">
	            <h1 class="custom-font"><strong>Danh sách các thư thoại</strong></h1>
	        </div>
	        <!-- /tile header -->

	        <!-- tile body -->
	        <div class="tile-body">
	            <div class="table-responsive">
								@foreach($contacts as $c)
								<div class="col-sm-4 portlets sortable ui-sortable">
                      <!-- tile -->
                      <section class="tile {{ $c->product != null ? 'bg-blue' : 'bg-lightred' }} portlet">
                          <!-- tile header -->
                          <div class="tile-header dvd dvd-btm ui-sortable-handle">
                              <h1 class="custom-font">{{$c->name}}</h1>
                              <ul class="controls">
                                  <li class="dropdown">
                                      <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                          <i class="fa fa-cog"></i>
                                          <i class="fa fa-spinner fa-spin"></i>
                                      </a>
                                      <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                          <li>
																						<form action="{{ route('admin.contact.saw', $c->id) }}" method="POST">
																							{{ csrf_field() }}
																							{{ method_field('PATCH') }}
																							<button role="button" tabindex="0" class="tile-refresh btn btn-default"><i class="fa fa-refresh"></i> Xác nhận đã xem</button>
																						</form>
                                          </li>
                                      </ul>
                                  </li>
                                  <li class="remove">
																		<form action="{{ route('admin.contact.destroy', $c->id) }}" method="POST">
																			{{ csrf_field() }}
																			{{ method_field('DELETE') }}
																			<button class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?');"><i class="fa fa-times"></i></button>
																		</form>
																	</li>
                              </ul>
                          </div>

                          <div class="tile-body">
														<p><strong>Email: </strong><span>{{ $c->email }}</span></p>
														<p><strong>Phone: </strong><span>{{ $c->phone }}</span></p>
														@if($c->body != null)
														<p class="_body"><span>{{ $c->body }}</span></p>
														@endif

														@if($c->product != null)
														<p><strong>Cần tư vấn: </strong><span>{{ $c->product }}</span></p>
														@endif
														Đã gửi: {{ $c->created_at }}
                          </div>
                      </section>
                  </div>
									@endforeach
									<div class="clearfix"></div>
	            </div>
	        </div>
	    </section>
	</div>
@endsection

@push('css')
	<style media="screen">
		._body {
	    border: 1px solid;
	    padding: 10px 5px;
	    background: #a2a1a1;
			border-radius: 3px;
		}
	</style>
@endpush
