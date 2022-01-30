<nav class="navbar navbar-expand navbar-light shadow-sm bg-white fixed-top" style="direction: {{ str_replace('_', '-', app()->getLocale()) == 'en' ? 'rtl' : 'ltr' }}">
    <div class="d-flex align-items-center">

        <a class="navbar-brand" href="{{ url('/') }}" target="_blank">
            <img src="{{asset('/images/saiLogo.png')}}" alt="SAI logo" width="50">
        </a> 

        
        @if(userRole('user.view'))
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
        @endif

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