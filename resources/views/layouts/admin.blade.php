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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @yield('head-script')

    @yield('style')

    @livewireStyles
</head>
<body>
    <div class="d-none alert alert-success alert-dismissible fade show px-3 w-75 m-auto" role="alert" id="response_success" style="position: fixed;z-index: 1;bottom: 20px;right:0;left:0">
        <p id="msg_success" class="mb-0"></p>
    </div>
    <div class="d-none alert alert-danger alert-dismissible fade show px-3 w-75 m-auto" role="alert" id="response_error" style="position: fixed;z-index: 1;bottom: 20px;right:0;left:0">
        <p id="msg_error" class="mb-0"></p>
    </div>

    @include('layouts/parts/admin/sidenav')

    <div id="app">
        
        @include('layouts/parts/admin/navbar')

        <div class="py-5"></div>
        <main class="py-4">
            <div class="container-fluid" style="min-height: 70vh">
                <div class="row" dir="ltr">
                    <div class="col-lg-10 offset-lg-1" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
