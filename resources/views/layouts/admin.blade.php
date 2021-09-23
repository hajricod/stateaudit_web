<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @yield('head-script')

    @yield('style')

    @livewireStyles
</head>
<body>
    <div id="backdrop"></div>
    {{-- <div class="loading">
        <div class="img-loader">
            <img src="{{ asset('/images/loader.svg')}}" alt="loader">
            <img class="logo" src="{{ asset('/images/saiLogo.png')}}" alt="logo">
        </div>
    </div> --}}
    {{-- <button class="btn m-3 py-2" id="menu">
        <div class="bars">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </button> --}}

    <div class="menu-icon">
        <div class="menu-bar"></div>
    </div>
    
    <div class="bg-white shadow-sm" id="side-nav">
        <div class="header">
            <h3 class="text-center p-3">{{__('Menu')}}</h3>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <a href="/admin/dashboard" class="btn btn-light btn-block text-dark">{{__('Dashboard')}}</a>
                </div>
            </div>
        </div>


        <div class="side-nav-content" style="position: relative">
            <ul class="list-group-flush p-0 side-nav-list my-2" id="sidebar">
                
                @can('group-complaint',  App\Models\Group::find(Auth::user()->group_id))
                    <li class="list-group-item">
                        <a href="/admin/complaint">{{__('Complaints')}}</a>
                    </li>
                @endcan

                @can('group-media',  App\Models\Group::find(Auth::user()->group_id))
                    <li class="list-group-item p-0">
                        <a href="#news" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action border-0">
                            {{app()->getLocale() == 'ar'? __('Media and Awareness Center') : Str::limit(__('Media and Awareness Center'), 20, ' ...')}}
                            
                            <svg width="1em" height="1em" viewBox="0 0 16 16" 
                            class="bi bi-caret-up-fill arowNav 
                            {{app()->getLocale() == 'ar'? 'float-left' : 'float-right'}}" 
                            fill="currentColor" 
                            xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                            </svg>
                        </a>
                        <ul class="collapse pr-0 px-2 list-group-flush" id="news">
                            <li class="list-group-item">
                                <a href="/admin/news">{{__('News')}}</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/admin/media">{{__('Media Content Managment')}}</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/admin/faq">{{__('FAQ')}}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/feedback">{{__('Feedback')}}</a>
                    </li>
                @endcan

                @can('group-admin',  App\Models\Group::find(Auth::user()->group_id))
                    <li class="list-group-item">
                        <a href="/admin/users">{{__('Users')}}</a>
                    </li>
                
                    <li class="list-group-item">
                        <a href="/admin/library">{{__('Library Manager')}}</a>
                    </li>
                @endcan
                
                <li class="list-group-item">
                    <a href="/admin/employees">{{__('Employees Section')}}</a>
                </li>
            </ul>
        </div>
        
        <div class="footer" style="position: absolute; width:100%;">
            @can('group-admin',  App\Models\Group::find(Auth::user()->group_id))
                <a class="btn btn-light btn-block p-2 text-dark text-center" href="{{route('settings')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                    </svg>
                    {{__('Settings')}}
                </a>
            @endcan
        </div>
    </div>
    <div id="app">
        <nav class="navbar navbar-expand navbar-light shadow-sm bg-white fixed-top" style="direction: {{ str_replace('_', '-', app()->getLocale()) == 'en' ? 'rtl' : 'ltr' }}">
            <div class="d-flex">

                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('/images/saiLogo.png')}}" alt="SAI logo" width="50">
                </a>  --}}

                
                @can('group-complaint',  App\Models\Group::find(Auth::user()->group_id))
                    <div class="dropdown">
                        <button class="btn btn-link" type="button" id="dropdownNotifButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none" {{count($notifCounter) == 0 ? 'disabled' : ''}}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="{{count($notifCounter) > 0 ? '#ffcb4a' : '#ccc'}}" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                            </svg>
                            @if (count($notifCounter) > 0)
                                {{count($notifCounter)}}
                            @endif 
                        </button>
                        
                        <div class="dropdown-menu {{app()->getLocale() == 'ar'? 'dropdown-menu-left': 'dropdown-menu-right'}}" aria-labelledby="dropdownNotifButton">
                            
                            @foreach ($notifications as $notify)
                                @if ($notify->status)
                                    <form action="/admin/notifications/{{$notify->id}}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status" value="0">
                                    
                                        <button 
                                        type="submit" 
                                        class="
                                        dropdown-item
                                        list-group-item-action
                                        d-flex 
                                        justify-content-between align-items-center  
                                        {{app()->getLocale() == 'ar'? 'text-right pr-3 pl-1' : 'pr-1 pl-3'}}">
                                            <span class="badge badge-pill">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-dot text-success" viewBox="0 0 16 16">
                                                    <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                                </svg>
                                            </span>
                                            @if (app()->getLocale() == 'ar')
                                                {{$notify->created_at->format("M j, Y, g:i A")}} - {{$notify->title}}
                                            @else
                                                {{$notify->title_en}} - {{$notify->created_at->format("M j, Y, g:i A")}}
                                            @endif
                                        </button>
                                    </form>

                                    @else
                                    <button class="
                                    dropdown-item d-flex 
                                    justify-content-between align-items-center  
                                    {{app()->getLocale() == 'ar'? 'text-right pr-3 pl-1' : 'pr-1 pl-3'}}" 
                                    disabled>
                                        <span class="badge badge-pill">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="#ccc" class="bi bi-dot" viewBox="0 0 16 16">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                            </svg>
                                        </span>
                                        @if (app()->getLocale() == 'ar')
                                            {{$notify->created_at->format("M j, Y, g:i A")}} - {{$notify->title}}
                                        @else
                                            {{$notify->title_en}} - {{$notify->created_at->format("M j, Y, g:i A")}}
                                        @endif
                                    </button>
                                @endif
                                <div class="dropdown-divider"></div>
                            @endforeach
                            <a class="dropdown-item {{app()->getLocale() == 'ar'? '' : ''}} text-center" href="/admin/notifications">
                                {{__('Show More')}}
                            </a>
                        </div>
                        
                    </div>
                @endcan

                <div class="navbar p-0" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav px-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              {{-- {{__('Language')}} --}}
                              @if (app()->getLocale() == 'ar')
                                  <img src="{{asset('/images/oman-flag.png')}}" alt="Oman Flag" width="25px">
                                  @else
                                    <img src="{{asset('/images/uk-flag.png')}}" alt="Oman Flag" width="25px">
                              @endif
                            </a>
                            <div 
                            style="min-width: 40px"
                            class="dropdown-menu py-0 text-center
                            {{app()->getLocale() == 'ar'? 'dropdown-menu-left': 'dropdown-menu-right'}} 
                            text-right" 
                            aria-labelledby="navbarDropdown">
                                <a class="dropdown-item {{app()->getLocale() == 'ar'? 'active': ''}}" href="{{route('language')}}?lang=ar">
                                    {{__('Arabic')}}
                                </a>

                                <a class="dropdown-item {{app()->getLocale() == 'en'? 'active': ''}}" href="{{route('language')}}?lang=en">
                                    {{__('English')}}
                                </a>
                            </div>
                        </li>
                    </ul>

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav px-2">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu {{app()->getLocale() == 'ar'? 'dropdown-menu-left': 'dropdown-menu-right'}} {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'text-right' : ''}}" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">
                                        {{ __('Home') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile')}}">
                                        {{ __('Profile') }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/admin/dashboard">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        
                    </ul>
                </div>
            </div>
        </nav>

        {{-- @yield('banner') --}}

        <div class="py-5"></div>
        <main class="py-4">
            <div class="container-fluid" style="min-height: 70vh">
                <div class="row" dir="ltr">
                    <div class="col-lg-8 offset-lg-2" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        
        
    </div>

    <footer>
        <p class="text-center">{{ __('State Audit Institution') }} &copy; {{ now()->year}}</p>
    </footer>

    @if (session()->has('message'))
        <x-toast :message="session()->get('message')" />
    @endif
        
    {{-- @php
        $ahmed = "ahmed";
    @endphp --}}

    {{-- <x-toast message="ahmed" /> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       $().ready(function() {
            setTimeout(() => {
                $(".loading").addClass("loader-exit");

                setTimeout(() => {
                    $(".loading").remove();
                }, 1000);
            }, 1000);

            // $( "button#menu" ).click(function() {
            //     $(".bars").toggleClass( "bars-x" );
            //     $("#side-nav").toggleClass( "open-side-nav" );
            //     $("#app").toggleClass( "expand-app" );
            //     $("body").toggleClass( "backdrop" );
            // });

            $('.menu-icon').click(function(){
                $(this).toggleClass('activated');
                $("#side-nav").toggleClass("open-side-nav");
                $("#backdrop").addClass('backdrop-off');
                $("#backdrop").toggleClass("backdrop");
                setTimeout(() => {
                    $("#backdrop").removeClass('backdrop-off');
                }, 500);
                // $("body").toggleClass( "no-scroll" );
            });

            // $('#side-nav').click(function(){
            //     $('.menu-icon').toggleClass('activated');
            //     $("#side-nav").toggleClass( "open-side-nav" );
            //     $("#backdrop").toggleClass( "backdrop" );
            // })

            $('#backdrop').click(function(){
                $('.menu-icon').toggleClass('activated');
                $("#side-nav").toggleClass( "open-side-nav" );
                $("#backdrop").addClass('backdrop-off');
                $("#backdrop").toggleClass( "backdrop");
                setTimeout(() => {
                    $("#backdrop").removeClass('backdrop-off');
                }, 500);
                // $("body").toggleClass( "no-scroll" );
            })

            $('nav .dropdown').on('show.bs.dropdown', function(e){
                $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
            });
            
            $('nav .dropdown').on('hide.bs.dropdown', function(e){
                $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
            });

            $(".side_nav").click(function(){

            $(".sub_side_nav").not($(this).next(".sub_side_nav")).slideUp("fast");

                $(this).next(".sub_side_nav").slideToggle("fast");

            });

            $('a').click( function(){

                if($(this).find("svg.arowNav").hasClass("rotateUp")){

                    $(this).find("svg.arowNav").removeClass('rotateUp');
                    $(this).find("svg.arowNav").addClass('rotateDown');
                }else {
                    $(this).find("svg.arowNav").removeClass('rotateDown');
                    $(this).find("svg.arowNav").addClass('rotateUp');
                }
            });

            $('#btnToastClose').on('click', function(){
                $('#toast').remove();
            })

            $('.toast').toast('show');

            setTimeout(() => {
                $('#toast').remove();
            }, 5000);

            // $("form").on('submit', function(){
            //     $("button[type=submit]").prop("disabled", true);
            //     $("button[type=submit]").append(`
            //         <span class="spinner-border text-light spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
            //     `);
            // });
            $(document).on('submit', 'form', function(){
                $(this).find("button[type=submit]").prop("disabled", true);
                $(this).find("button[type=submit]").append(`
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="spinner"></span>
                `)
            });
        });

    </script>
    @yield('script')

    @livewireScripts
</body>
</html>
