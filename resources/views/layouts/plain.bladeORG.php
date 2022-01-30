<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('State Audit Institution') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')

    @livewireStyles
</head>
<body style="height: 100%">
    {{-- login modal --}}
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <h4 class="invalid-feedback text-center" role="alert" id="msgLogin">
                    <strong>{{ __('Username or Password Incorrect!') }}</strong>
                </h4>
                <h4 class="invalid-feedback text-center" role="alert" id="msgLoginEmpty">
                    <strong>{{ __('Username and Password Required!') }}</strong>
                </h4>

                <form id="loginForm">
                    @csrf
                    
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label {{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label {{ app()->getLocale() == 'ar' ? 'text-md-left':'text-md-right'}}">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary" id="btnLogin">
                                {{ __('Login') }}
                            </button>

                            {{-- @if (Route::has('password.request', app()->getLocale())) --}}
                                <a class="btn btn-link" href="{{ route('password.request')}}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            {{-- @endif --}}
                        </div>
                    </div>
                </form>              
            </div>
          </div>
        </div>
    </div>

    <div class="loading">
        <div class="img-loader">
            <img src="{{ asset('/images/loader.svg')}}" alt="loader">
            <img class="logo" src="{{ asset('/images/saiLogo.png')}}" alt="logo">
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-white border-0 fixed-top">
            
            <div class="container">
                <div class="d-block d-md-none bg-light w-100 bg-white">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @php
                        $headerLinks = \DB::table('header_links')->get();
                        $headerSublinks = \DB::table('header_sublinks')->get();
                    @endphp
                    <ul class="navbar-nav pr-0">
                        @foreach ($headerLinks as $link)
                            @if ($link->url != '#')
                                <li class="nav-item {{$loop->index == 0? 'active' : ''}}">
                                    <a href="{{$link->url}}" class="nav-link">
                                        {{app()->getLocale() == 'ar'? $link->title : $link->title_en}}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{app()->getLocale() == 'ar'? $link->title : $link->title_en}}
                                    </a>
                                    <div class="dropdown-menu {{app()->getLocale() == 'en'? 'text-left dropdown-menu-left': 'text-right dropdown-menu-right'}}" aria-labelledby="navbarDropdown">
                                        @foreach ($headerSublinks as $sublink)
                                            @if ($sublink->header_links_id == $link->id)
                                                <a class="dropdown-item" href="{{$sublink->url}}">
                                                    {{app()->getLocale() == 'ar'? $sublink->title : $sublink->title_en}}
                                                </a> 
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'mr-auto':'ml-auto'}}  pr-0">
                        <!-- Authentication Links -->
                        @guest
                            @if (!Route::is(app()->getLocale(),'login'))
                                <li class="nav-item">
                                    <button type="button" class="btn btn-link nav-link" data-toggle="modal" data-target="#loginModal">
                                        {{ __('Login') }}
                                    </button>
                                </li>   
                            @endif
                            
                            @if (!Route::has(app()->getLocale(), 'register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register')}}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'text-right' : ''}}" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/admin/dashboard">
                                        {{ __('Dashboard') }}
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout')}}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout')}}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              @if (app()->getLocale() == 'ar')
                                  <img src="{{asset('/images/oman-flag.png')}}" alt="Oman Flag" width="25px">
                                  @else
                                    <img src="{{asset('/images/uk-flag.png')}}" alt="Oman Flag" width="25px">
                              @endif
                            </a>
                            <div
                            style="min-width: 40px"
                            class="dropdown-menu py-0 text-center
                            dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{app()->getLocale() == 'ar'? 'active': ''}}" href="{{route('language')}}?lang=ar">
                                    {{__('Arabic')}}
                                </a>

                                <a class="dropdown-item {{app()->getLocale() == 'en'? 'active': ''}}" href="{{route('language')}}?lang=en">
                                    {{__('English')}}
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div id="app" class="h-100 d-flex align-items-center justify-content-center"> 
        {{-- <div id="top-logos" class="top-logos container-fluid bg-white d-md-flex justify-content-around align-items-center d-sm-none d-none d-md-block">
            <a class="navbar-brand mr-0" href="/">
                <img src="{{asset('/images/saiText.png')}}" alt="SAI Text logo" width="250">
                
            </a>
            <a class="navbar-brand mr-0" href="/">
                <img src="{{asset('/images/saiLogo.png')}}" alt="SAI logo" width="100">
                
            </a>
            <a class="navbar-brand mr-0" href="/">
                <img src="{{asset('/images/2040Logo.png')}}" alt="Oman Vision 2040 logo" width="150">
                
            </a>
        </div>

        <div id="top-logos" class="top-logos container-fluid bg-white d-block  d-md-none">
           
            <a class="navbar-brand mr-0 text-center d-block" href="/">
                <img src="{{asset('/images/saiLogo.png')}}" alt="SAI logo" width="50">
                
            </a>
            <a class="navbar-brand mr-0 text-center d-block" href="//">
                <img src="{{asset('/images/saiText.png')}}" alt="SAI Text logo" width="150">
                
            </a>
            <a class="navbar-brand mr-0 text-center d-block" href="//">
                <img src="{{asset('/images/2040Logo.png')}}" alt="Oman Vision 2040 logo" width="100">
                
            </a>
        </div> --}}
        

        {{-- @yield('banner') --}}
        
        {{-- <main class="py-lg-4 py-1"> --}}
            @yield('content')
        {{-- </main> --}}
    </div>
    {{-- <footer>
        <div class="links-holder">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="row">
                        @php
                            
                            $footerCategories = \DB::table('footer_categories')->get();
                            $footerLinks = \DB::table('footer_links')->get();

                        @endphp

                        @foreach ($footerCategories as $footerCate)
                            <div class="col-md-3">
                                <ul>
                                    <li>
                                        <h5>{{ app()->getLocale() == 'ar' ? $footerCate->title : $footerCate->title_en}}</h5>
                                    </li>
                                    @foreach ($footerLinks as $footerLink)
                                        @if ($footerCate->id == $footerLink->footer_cate_id)
                                            <a href="{{$footerLink->url}}" target="{{Str::startsWith($footerLink->url, 'http') ? '_blank': ''}}">
                                                <li>{{ app()->getLocale() == 'ar' ? $footerLink->title : $footerLink->title_en}}</li>
                                            </a>                                             
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center">{{ __('State Audit Institution') }} &copy; {{ now()->year}}</p>
    </footer> --}}
    <script src="{{ asset('js/echo.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       $().ready(function() {
        //    let position = 0;
        //    $(window).scroll(function() {
        //         if($(this).scrollTop() > 0) {
        //             $('.top-logos').addClass('top-logos-hide');
        //             $('.navbar').addClass('fixed-top');
        //             $('.navbar').addClass('top');
        //         } else {
        //             $('.top-logos').removeClass('top-logos-hide');
        //             $('.navbar').removeClass('fixed-top');
        //             $('.navbar').removeClass('top');
        //         }
        //     });

            setTimeout(() => {
                $(".loading").addClass("loader-exit");

                setTimeout(() => {
                    $(".loading").remove();
                }, 1000);

            }, 1000);

            $('.dropdown').on('show.bs.dropdown', function(e){
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
            });
            
            $('.dropdown').on('hide.bs.dropdown', function(e){
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
            });

            
            $("#btnLogin").click(function (event) {

                event.preventDefault();

                var data = $('#loginForm').serialize();
                var btnLogin = $("#btnLogin");
                var txtEmail = $("#email").val();
                var txtPassword = $("#password").val();
                var msgLogin = $('#msgLogin');
                var msgLoginEmpty = $('#msgLoginEmpty');

                btnLogin.prop("disabled", true);
                btnLogin.append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                msgLogin.removeClass("d-inline-block");
                msgLoginEmpty.removeClass("d-inline-block");

                var csrf_token = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrf_token
                    }
                });

                if(txtEmail && txtPassword) {

                    $.ajax({
                        type: "POST",
                        url: "{{route('checkLogin')}}",
                        data: data,
                        success: function (res) {

                            if(res == 1) {
                                window.location.replace("{{route('dashboard')}}");
                            }else if(res == 3) {
                                btnLogin.prop("disabled", false);
                                $('#btnLogin span.spinner-border').remove();
                                msgLogin.toggleClass('d-inline-block');
                            }
                            
                        }
                    });

                } else {
                    btnLogin.prop("disabled", false);
                    $('#btnLogin span.spinner-border').remove();
                    msgLoginEmpty.toggleClass('d-inline-block');
                }

            });

            $(document).on('submit', 'form', function(){
                $(this).find("button[type=submit]").prop("disabled", true);
                $(this).find("button[type=submit]").append(`
                    <span class="spinner-border text-light spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
                `);
            });
        });
    </script>
    @yield('script')

    @livewireScripts
</body>
</html>
