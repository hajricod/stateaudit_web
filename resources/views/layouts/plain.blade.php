<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('State Audit Institution') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/new.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/new.css') }}" rel="stylesheet">

    @yield('style')

    @livewireStyles
</head>
<body>
    @include('layouts/parts/site/fullPageLoginModal')

    @include('layouts/parts/site/fullSearchModal')
    
    <div class="loading">
        <div class="img-loader">
            <img src="{{ asset('/images/loader.svg')}}" alt="loader">
            <img class="logo" src="{{ asset('/images/saiLogo.png')}}" alt="logo">
        </div>
    </div>

        <div class="site-logo">
            <img src="{{asset('/images/saiLogo.png')}}" alt="SAI logo" width="100%">
        </div>
        
        {{-- <nav class="fixed-top navbar navbar-expand-md navbar-light shadow-sm border-0
        " style="background-color: rgb(113 15 17 / 50%);">
            
            <div class="container-fluid">
                <div class="d-block d-md-none w-100">
                    <button class="navbar-toggler rounded-circle p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </button>
                </div>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav px-0 main-navbar">
                        @foreach ($headerLinks as $link)
                            @if ($link->url != '#')
                                <li class="nav-item {{Route::currentRouteName() == $link->url? 'active' : ''}}">
                                    <a href="{{$link->url}}" class="nav-link">
                                        {{app()->getLocale() == 'ar'? $link->title : $link->title_en}}
                                    </a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{app()->getLocale() == 'ar'? $link->title : $link->title_en}}
                                    </a>
                                    <div class="dropdown-menu {{app()->getLocale() == 'ar'? 'text-right dropdown-menu-end': 'text-left dropdown-menu-start'}} shadow" aria-labelledby="navbarDropdown">
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
                    <ul class="navbar-nav {{ lang() == 'ar' ? 'mr-auto me-auto':'ml-auto ms-auto'}}  px-0">
                        <!-- Authentication Links -->
                        @guest
                            @if (!Route::is(app()->getLocale(),'login'))
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal" style="cursor: pointer">
                                        {{ __('Login') }}
                                    </a>
                                </li>   
                            @endif
                            
                            @if (!Route::has(app()->getLocale(), 'register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register')}}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'text-right' : ''}}" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/admin/dashboard">
                                        {{ __('Dashboard') }}
                                    </a>


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
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              @if (app()->getLocale() == 'ar')
                                  <img src="{{asset('/images/oman-flag.png')}}" alt="Oman Flag" width="25px">
                                  @else
                                    <img src="{{asset('/images/uk-flag.png')}}" alt="Oman Flag" width="25px">
                              @endif
                            </a>
                            <div
                            style="min-width: 40px"
                            class="dropdown-menu py-0 text-center
                            dropdown-menu {{app()->getLocale() == 'ar'? 'text-left dropdown-menu-start': 'text-right dropdown-menu-end'}}" aria-labelledby="navbarDropdown">
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
        </nav> --}}

        @include('layouts/parts/site/navbar')

        @yield('banner')
        
        <main class="d-flex justify-content-center align-items-center">
            @yield('content')
        </main>
        <div id="webframe-bottom">
        </div>
    </div>
    <footer style="">
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
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <a class="navbar-brand m-3 text-center d-block" href="#">
                        <img src="{{asset('/images/2040Logo-light.png')}}" alt="Oman Vision 2040 logo" width="200">
                    </a>
                </div>
            </div>
        </div>
        <p class="text-center copyright">{{ __('State Audit Institution') }} &copy; {{ now()->year}}</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       $().ready(function() {
           let position = 0;
           $(window).scroll(function() {
                if($(this).scrollTop() > 0) {

                    $('.navbar').addClass('show-nav');

                } else {
                    $('.navbar').removeClass('show-nav');
                }
            });

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