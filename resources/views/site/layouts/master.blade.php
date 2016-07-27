<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ $setting['set_title'] or '' }}</title>
	<meta name="keywords" content="{{ $metaSEO['keywords'] or '' }}"/>
	<meta name="description" content="{{ $setting['descriptions'] or '' }}"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta property="fb:app_id" content="{{ $setting['fb_app_id'] or null }}" />
	<meta property="fb:admins" content="{{ $setting['fb_admin_id'] or null }}"/>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/bootstrap.css')) }}">
	<link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/sweetalert.css')) }}">
	<link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/app.css')) }}">
	<link rel="stylesheet" media="(max-width: 1024px)" href="{{ asset(elixir('css/1024.css')) }}">
	<link rel="stylesheet" media="(max-width: 928px)" href="{{ asset(elixir('css/928.css')) }}">
	<link rel="stylesheet" media="(max-width: 768px)" href="{{ asset(elixir('css/768.css')) }}">
	<link rel="stylesheet" media="(max-width: 640px)" href="{{ asset(elixir('css/640.css')) }}">
	<link rel="stylesheet" media="(max-width: 480px)" href="{{ asset(elixir('css/480.css')) }}">
	<link rel="stylesheet" media="(max-width: 320px)" href="{{ asset(elixir('css/320.css')) }}">
	@stack('css')
</head>
<body>
	<script>
		$body = $("body");
		$(document).on({
				ajaxStart: function() { $body.addClass("loading");    },
				ajaxStop: function() { $body.removeClass("loading"); }
		});
	</script>
	<div class="append"></div>
	<style media="screen">
		.append { display: none;position: fixed; z-index: 1000; top: 0; left: 0; height: 100%;	width: 100%;	background: rgba( 255, 255, 255, .8 ) url('/build/img/load.gif')	50% 50% no-repeat; } body.loading { overflow: hidden; } body.loading .append { display: block;	}
	</style>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=1647393925578689";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<div id="top-header">
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-xs-12 col-sm-12 col-md-10">
				<div class="col-md-6 col-xs-12 col-sm-12 col-lg-6 contact-me">
					<ul class="hotline">
						<li class="phone"><i>{{ $setting['hotline'] or '097.2222.958' }}</i></li>
						<li class="e-mail"><i>{{ $setting['email'] or 'hsvnglobal@gmail.com' }}</i></li>
					</ul>
				</div>
				<div class="col-md-3">
					<script type="text/javascript">
						var _url = "{{ route('data.json') }}";
					</script>
					<form action="{{ route('get.search') }}" method="GET">
						<div class="input-group">
                <input type="text" name="keywords" class="form-control search" placeholder="Tìm kiếm nhanh" id="keywords">
                <button class="search">
                	<img src="{{ asset('build/img/search.gif') }}">
                </button>
            </div>
					</form>
				</div>
				<div class="col-md-3">
					<ul class="social">
						<li><a href="{{ $setting['facebook'] or '#' }}"><img src="{{ asset('build/img/face.gif') }}"></a></li>
						<li><a href="{{ $setting['twice'] or '#' }}"><img src="{{ asset('build/img/twice.gif') }}"></a></li>
						<li><a href="{{ $setting['google_plus'] or '#' }}"><img src="{{ asset('build/img/google.gif') }}"></a></li>
						<li><a href="{{ $setting['youtube'] or '#' }}"><img src="{{ asset('build/img/youtube.gif') }}"></a></li>
						<li><a href="mailto:{{ $setting['email'] or '#' }}"><img src="{{ asset('build/img/mail.gif') }}"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="nav-shadow">
		<div class="container">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>
				    <div class="collapse navbar-collapse navbar-ex1-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
                <li {{ Request::segment(1) == null ? 'class=active' : '' }}><a href="/">Trang chủ</a></li>
                @foreach($menuItem as $item)
                    {!! navication($item) !!}
                @endforeach
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="intro">
		<div class="banner">
			{!! generateImage('oVYuixEChtww') !!}
		</div>
		<div class="service">
			<div class="col-md-6 col-lg-6">
				<div class="sv-company">
					<div class="col-md-7 welcome">
						<span>Chào mừng đến với</span>
						<h2>Công ty</h2>
					</div>
					<div class="col-md-5 col-lg-5 high-light">
						<span>Với uy tín - chất lượng</span>
						<h2>10 năm</h2>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-12 col-lg-12">
					<div class="slogan">
						Với bề dày kinh nghiệm trong phân phối máy lọc không khí, đội ngũ cán bộ được đào tạo chuyên sâu. Hãy gọi ngay cho chúng tôi để được tư vấn các giải pháp và dòng máy lọc không khí tốt nhất, phù hợp nhất với nhu cầu sử dụng...
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 term-red">
				<div class="col-md-9 term-pd">
					<div class="term-padd">
						<span>Sản phẩm</span>
						<h2>Đa dạng trong chuẩn loại</h2>
					</div>
					<div class="term-padd">
						<span>Chất lượng</span>
						<h2>Vượt trội-tiên tiến</h2>
					</div>
				</div>
				<div class="col-md-3 term"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>

	@yield('content')

	@yield('news')


	<div class="clearfix"></div>
	<div id="footer">
		<div class="feature">
			<div class="layout-80">
				<div class="col-md-6 ft-menu">
					<div class="footer-menu">
						<h3><span class="uptolower">{{ $setting['name'] or '' }}</span></h3>
						<div class="about-us">
							{!! $setting['about_us'] or null !!}
						</div>
					</div>
				</div>
				<div class="col-md-3 ft-menu">
					<div class="footer-menu">
						<h3>Chính sách khách hàng</h3>
						<ul class="item-menu">
							@foreach($policyCustomer as $item)
									{!! navication($item) !!}
							@endforeach
						</ul>
					</div>
					<div class="footer-menu">
						<h3>Hỗ trợ khách hàng</h3>
						<ul class="item-menu">
							@foreach($supportCustomer as $item)
									{!! navication($item) !!}
							@endforeach
							<li class="permission">
								<a href=""><img src="{{asset('/build/img/per.png')}}"></a>
							</li>
						</ul>
					</div>
				</div>
				<!-- <div class="col-md-3 slide-mb">
					<div class="slide">
						<div class="carousel slide" id="myCarousel">
						  <div class="carousel-inner">
						    <div class="item active">
						      <div class="col-md-6"><a href="#"><img src="{{asset('/build/img/slide1.png')}}" /></a></div>
						    </div>
						    <div class="item">
						      <div class="col-md-6"><a href="#"><img src="{{asset('/build/img/slide1.png')}}" /></a></div>
						    </div>
						    <div class="item">
						      <div class="col-md-6"><a href="#"><img src="{{asset('/build/img/slide1.png')}}" /></a></div>
						    </div>
						  </div>
						  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
						  <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
						</div>
					</div>
				</div> -->
				<div class="col-md-3 col-xs-6 col-sm-6">
					<div class="slide">
						{!! $setting['fan_page_fb'] or null !!}
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="copy-right">
			<div class="layout-80">
				<div class="license">
					<p class="high-light">Copyright © 2016 -  <span class="uptolower">{{ $setting['name'] or '' }}</span>. All rights reserved</p>
					<p class="high-light"> Designed by <a href="http://danangtech.com/">danangtech.com</a></p>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="{{ asset(elixir('js/app.js')) }}"></script>
	<script type="text/javascript" src="{{ asset(elixir('js/bootstrap.js')) }}"></script>
	<script type="text/javascript" src="{{ asset(elixir('js/sweetalert.js')) }}"></script>
	<script type="text/javascript" src="{{ asset(elixir('js/autocomplete.js')) }}"></script>
	@stack('js')
	{{ $setting['google_analytics'] or null }}
	{{ $setting['chat_box'] or null }}

	<script type="text/javascript">
	  window.___gcfg = {lang: 'vi'};

	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/platform.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>

</body>
</html>
