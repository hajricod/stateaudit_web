<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="top">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('State Audit Institution') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/new.js') }}" defer></script>
    @yield('head-script')
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link href="{{ asset('css/new.css') }}" rel="stylesheet">

    @yield('style')

    @livewireStyles
</head>
<body>
    
    @include('layouts/parts/site/fullPageLoginModal')

    {{-- @include('layouts/parts/site/fullSearchModal') --}}
    
    <div class="loading">
        <div class="img-loader">
            <img src="{{ asset('/images/loader.svg')}}" alt="loader">
            <img class="logo" src="{{ asset('/images/saiLogo.png')}}" alt="logo">
        </div>
    </div>

        <div class="site-logo">
            <img src="{{asset('/images/saiLogo.png')}}" alt="SAI logo" width="100%">
        </div>
        
        @include('layouts/parts/site/navbar')

        @yield('banner')
        
        <main {!! Request::is('/')? 'style="padding-top: 80px"' : '' !!}>
            @yield('content')
        </main>
        <div id="webframe-bottom">
        </div>
        <div id="btn-top" class="position-fixed fixed-bottom mx-3 mb-3 d-none" style="height: 40px; width: 40px">
            <a href="#top" class="btn btn-light rounded h-100 w-100 shadow p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" class="bi bi-arrow-up-short text-primary" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z"/>
                </svg>
            </a>
        </div>
    </div>
    @include('layouts/parts/site/footer')

    {{-- <script src="{{ asset('js/echo.js') }}" defer></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       $().ready(function() {
           let position = 0;
           $(window).scroll(function() {
                if($(this).scrollTop() > 0) {
                    // $('.top-logos').removeClass('top-logos-show');
                    // $('.top-logos').addClass('top-logos-hide');
                    $('.navbar').addClass('show-nav');
                    // $('.navbar').addClass('top');
                } else {
                    // $('.top-logos').removeClass('top-logos-hide');
                    // $('.top-logos').addClass('top-logos-show');
                    $('.navbar').removeClass('show-nav');
                    // $('.navbar').removeClass('top');
                }

                // if($(this).scrollBottom() == 0) {
                //     $("#page-top").toggleClass("d-none")
                // }

                // if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                //     alert('end reached');
                // }
            });

            window.onscroll = function(ev) {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {

                    $("#btn-top").removeClass("d-none");

                }else {
                    $("#btn-top").addClass("d-none");
                }
            };

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

                //stop submit the form, we will post it manually.
                event.preventDefault();


                // Get form
                // var form = $('#fileUploadForm')[0];

                // Create an FormData object 
                // var data = new FormData(form);
                var data = $('#loginForm').serialize();
                var btnLogin = $("#btnLogin");
                var txtEmail = $("#email").val();
                var txtPassword = $("#password").val();
                var msgLogin = $('#msgLogin');
                var msgLoginEmpty = $('#msgLoginEmpty');

                // If you want to add an extra field for the FormData
                // data.append("CustomField", "This is some extra data, testing");

                // disabled the submit button and add spiner
                btnLogin.prop("disabled", true);
                btnLogin.append('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');

                // Reset messages
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
                                // window.location.replace("{{url(app()->getLocale(),'admin/dashboard')}}");
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