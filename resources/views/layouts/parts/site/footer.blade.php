<footer>
    <div class="links-holder">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="row">
                    @foreach ($footerCategories as $footerCate)
                        <div class="col-md-3">
                            <ul>
                                <li>
                                    <h5>{{ app()->getLocale() == 'ar' ? $footerCate->title : $footerCate->title_en}}</h5>
                                </li>
                                @foreach ($footerLinks as $footerLink)
                                    @if ($footerCate->id == $footerLink->footer_cate_id)
                                        <a href="{{$footerLink->url}}" target="{{Str::startsWith($footerLink->url, 'http') ? '_blank': ''}}">
                                            <li>
                                                @if ($footerLink->show_title == 0)
                                                    <span style="font-size: 20px">
                                                        {!! $footerLink->icon !!}
                                                    </span>
                                                @else
                                                    <span style="font-size: 20px">
                                                        {!! $footerLink->icon !!}
                                                    </span>
                                                   {{ app()->getLocale() == 'ar' ? $footerLink->title : $footerLink->title_en}} 
                                                @endif
                                                
                                            </li>
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
            {{-- <div class="col">
                <a class="navbar-brand mr-0 text-center d-block" href="/">
                    <img src="{{asset('/images/saiLogo.png')}}" alt="SAI logo" width="50">
                    
                </a>
            </div>
            <div class="col">
                <a class="navbar-brand mr-0 text-center d-block" href="//">
                    <img src="{{asset('/images/saiText.png')}}" alt="SAI Text logo" width="150">
                    
                </a>
            </div> --}}
            <div class="col d-flex justify-content-center align-items-center">
                <a class="navbar-brand m-3 text-center d-block" href="#">
                    <img src="{{asset('/images/2040Logo-light.png')}}" alt="Oman Vision 2040 logo" width="200">
                </a>
            </div>
        </div>
    </div>
    <p class="text-center copyright">{{ __('State Audit Institution') }} &copy; {{ now()->year}}</p>
</footer>