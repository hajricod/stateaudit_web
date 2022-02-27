<nav class="fixed-top navbar navbar-expand-md navbar-light shadow-sm border-0" style="background-color: rgb(113 15 17 / 50%);">
            
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
                            {{-- <a class="nav-link d-inline-block" href="#">
                                {{app()->getLocale() == 'ar'? $link->title : $link->title_en}}
                            </a> --}}
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{app()->getLocale() == 'ar'? $link->title : $link->title_en}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                                </svg>
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

                <!-- Search -->
                <li class="nav-item d-none d-md-block">
                    {{-- <button class="shadow-none btn text-light px-3" id="btn-search" data-bs-toggle="modal" href="#searchModalToggle" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button> --}}
                    <a class="shadow-none btn text-light px-3" id="btn-search" href="/search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                </li>

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
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                            </svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow {{ str_replace('_', '-', app()->getLocale()) == 'ar' ? 'text-right' : ''}}" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/admin/dashboard">
                                {{ __('Dashboard') }}
                            </a>

                            {{-- <div class="dropdown-divider"></div> --}}

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
                    class="dropdown-menu py-0 text-center shadow {{app()->getLocale() == 'ar'? 'text-left dropdown-menu-start': 'text-right dropdown-menu-end'}}" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item {{app()->getLocale() == 'ar'? 'active': ''}}" href="{{route('language')}}?lang=ar">
                            {{__('Arabic')}}
                        </a>

                        <a class="dropdown-item {{app()->getLocale() == 'en'? 'active': ''}}" href="{{route('language')}}?lang=en">
                            {{__('English')}}
                        </a>
                    </div>
                </li>

                <li class="nav-item d-md-none d-block text-center">
                    <div class="d-grid gap-2 my-2">
                        {{-- <button class="btn btn-light text-dark px-3" id="btn-search" data-bs-toggle="modal" href="#searchModalToggle" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button> --}}
                        <a class="btn btn-light text-dark px-3" id="btn-search" href="/search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>