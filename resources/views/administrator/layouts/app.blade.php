<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Kin-backend - Admin Dashboard</title>
        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{asset('/assets/admin/css/vendor/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/admin/css/vendor/animate.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/admin/css/vendor/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/admin/js/vendor/animsition/css/animsition.min.css')}}">

        <!-- project main css files -->
        <link rel="stylesheet" href="{{asset('/assets/admin/css/main.css')}}">
        <!--/ stylesheets -->

        <script src="{{asset('/assets/admin/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>

    </head>

    <body id="minovate" class="appWrapper">

        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="wrap" class="animsition">

            <div class="page page-core page-login">

                <div class="text-center">
                    <h3 class="text-light text-white">
                        <span class="text-lightred">K</span>-Backend
                    </h3>
                </div>
                <div class="container w-420 p-15 bg-white mt-40 text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h2 class="text-light text-greensea">
                    @yield('action.name')
                    </h2>
                    @if (Session::has('authError'))
                        <p class="parsley-errors-list filled" style="text-align: left;">
                            <span class="parsley-required">{{ Session::get('authError') }}</span>
                        </p>
                    @endif

                    <form name="form" class="form-validation mt-20" action="@yield('action.form_action')" method="POST">
                        {{ csrf_field() }}
                        @yield('action.register')

                        <div class="form-group">
                            <input type="email" name="email" class="form-control underline-input{{ $errors->has('email') ? ' parsley-error' : '' }}" placeholder="E-mail" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <p class="parsley-errors-list filled" style="text-align: left;">
                                    <span class="parsley-required">{{ $errors->first('email') }}</span>
                                </p>
                            @endif

                        </div>

                        @yield('action.password')
                        @yield('action.confpassword')

                        <div class="form-group text-left mt-20">
                            @yield('action.do')
                        </div>

                        <div class="bg-slategray lt wrap-reset mt-20 text-left">
                            <p class="m-0">
                                @yield('action.hand')
                                <button class="btn btn-greensea b-0 mr-5 pull-right">
                                    @yield('action.name')
                                </button>
                            </p>
                        </div>

                    </form>
                </div>

            </div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/assets/admin/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="{{asset('/assets/admin/js/vendor/bootstrap/bootstrap.min.js')}}"></script>

        <script src="{{asset('/assets/admin/js/vendor/jRespond/jRespond.min.js')}}"></script>

        <script src="{{asset('/assets/admin/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>

        <script src="{{asset('/assets/admin/js/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>

        <script src="{{asset('/assets/admin/js/vendor/animsition/js/jquery.animsition.min.js')}}"></script>

        <script src="{{asset('/assets/admin/js/vendor/screenfull/screenfull.min.js')}}"></script>

        <script src="{{asset('/assets/admin/js/main.js')}}"></script>

        <script>
            $(window).load(function(){
                //
            });
        </script>
        <!--/ Page Specific Scripts -->
    </body>
</html>
