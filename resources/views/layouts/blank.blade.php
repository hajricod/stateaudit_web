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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/new.css') }}" rel="stylesheet">

    @yield('style')

    @livewireStyles
</head>
<body>

    <div class="loading">
        <div class="img-loader">
            <img src="{{ asset('/images/loader.svg')}}" alt="loader">
            <img class="logo" src="{{ asset('/images/saiLogo.png')}}" alt="logo">
        </div>
    </div>

        {{-- <div class="site-logo">
            <img src="{{asset('/images/saiLogo.png')}}" alt="SAI logo" width="100%">
        </div> --}}

        @yield('banner')
        
        <main class="p-0">
            @yield('content')
            <p class="text-center copyright">{{ __('State Audit Institution') }} &copy; {{ now()->year}}</p>
        </main>
        
    </div>
    {{-- <footer> --}}
        {{-- <p class="text-center copyright">{{ __('State Audit Institution') }} &copy; {{ now()->year}}</p> --}}
    {{-- </footer> --}}
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

        });
    </script>

    @yield('script')

    @livewireScripts
</body>
</html>