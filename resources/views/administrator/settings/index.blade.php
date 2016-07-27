@extends('administrator.layouts.master')

@section('content')
<div class="page">
	<div class="pageheader">
			<h2>Cấu hình site</h2>

			<div class="page-bar">

					<ul class="page-breadcrumb">
							<li>
									<a href="/admin"><i class="fa fa-home"></i> K-Backend</a>
							</li>
							<li>
									<a href="">Cấu hình</a>
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
						<h1 class="custom-font"><strong>Các khóa</strong></h1>
						<ul class="controls">
							@if(Auth::check())
									@if(Auth::guard('web_users')->user()->role == 1)
								<li>
										<a role="button" tabindex="0" href="{{ route('admin.settings.create') }}"><i class="fa fa-plus mr-5"></i> Thêm option key</a>
								</li>
									@endif
							@endif
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
				<div class="tile-body">
						<div class="table-responsive">
								<table class="table table-custom" id="editable-usage">
										<thead>
										<tr>
												<th>Option Key</th>
												<th>Option Value</th>
												<th class="no-sort"></th>
										</tr>
										</thead>
										<tbody>
										@if( $settings )
											@foreach( $settings as $s )
											<tr class="odd gradeX">
													<td><a href="{{ route('admin.settings.show', $s->id) }}">{{ $s->option_key }}</a></td>
													@if($s->type == 'image')
													<td><img src="{!! asset($s->option_value) !!}" ></td>
													@else
													<td>{!! $s->option_value !!}</td>
													@endif
													<td class="actions">
														<form action="{{ route('admin.settings.destroy', $s->id) }}" method="POST">
															{{ method_field('DELETE') }}
															{{ csrf_field() }}
															<a href="{{ route('admin.settings.edit', $s->id) }}" role="button" tabindex="0" class="edit text-primary text-uppercase text-strong text-sm mr-10">Sửa</a>
															@if(Auth::check())
																	@if(Auth::guard('web_users')->user()->role == 1)
																		<button role="button" tabindex="0" class="delete text-danger text-uppercase text-strong text-sm mr-10" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
																	@endif
															@endif
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
