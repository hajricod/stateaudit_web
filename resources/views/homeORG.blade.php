@extends('layouts.app')

@section('banner')
<div class="banner">
  <div id="carouselNews" class="carousel slide carousel-fade h-100" data-ride="carousel" style="direction: ltr!important">
      <ol class="carousel-indicators">
        @foreach ($news as $new)
          <li data-target="#carouselNews" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active' : ''}}"></li>
        @endforeach
      </ol>
      <div class="carousel-inner h-100">
        @foreach ($news as $new)
            <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}} h-100" style='background-image: url({{asset("storage/news/$new->image")}})'>
              <a class="d-block h-100" href='{{url("/news/$new->id")}}'>
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="rounded" style="
                  line-height: 2;
                  background-color: rgb(0 0 0 / 30%);
                  ">{{ app()->getLocale() == 'ar' ? $new->title : $new->title_en}}</h5>
                </div>
              </a> 
            </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselNews" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselNews" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
</div>    
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-md-10"> --}}
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                          <a href="/complaint/create">
                            <div class="circle shadow-sm">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cursor-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
                                </svg>
                                <p>{{ __('Complaints') }}</p>
                            </div>
                          </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                          <a href="/pages/fdgo/87">
                            <div class="circle shadow-sm">
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z"/>
                                <path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z"/>
                              </svg>
                              <p>{{ __('FDGO') }}</p>
                            </div>
                          </a>
                        </div>
                    
                        {{-- <div class="col-lg-3 col-md-6">
                            <div class="circle shadow-sm">
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                              </svg>
                              <p>{{ __('Tenders') }}</p>
                            </div>
                        </div> --}}
                        
                        <div class="col-lg-4 col-md-6">
                          <a href="/media">
                            <div class="circle shadow-sm">
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-checklist" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                              </svg>
                              <p>{{ __('Media and Awareness Center') }}</p>
                            </div>
                          </a>
                        </div>
                    </div>
                {{-- </div> --}}
                {{-- <div class="col-md-6">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="https://via.placeholder.com/700x400/CCCCCC/000000?Text=WebsiteBuilders.com" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="https://via.placeholder.com/700x400/CCCCCC/000000?Text=WebsiteBuilders.com" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Second slide label</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="https://via.placeholder.com/700x400/CCCCCC/000000?Text=WebsiteBuilders.com" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>Third slide label</h5>
                              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div> --}}
            {{-- </div> --}}




            <section class="mt-5 mb-3 p-3 border-0">
              <h5 class="text-center">المنظمات الرقابية والدولية</h5>
              <hr class="mt-0">
              <div class="row">
                @foreach ($institutes as $institute)
                  <div class="col-md-4">
                    <a href="#">
                      <div class="card mb-3" style="height: 100px;">
                        <div class="d-flex align-self-center my-3">
                          <img class="p-2 img-fluid" src="{{asset("images/". $institute['img'] ."")}}" alt="{{$institute['title']}}">
                        </div>
                      </div>
                    </a>           
                  </div>                    
                @endforeach
              </div>
            </section>

            <section class="p-3 border-0 mb-3 bg-white">
              <h5 class="text-center">الجوائز والإنجازات</h5>
              <hr class="mt-0">
              <div class="row justify-content-center">
                @foreach ($awards as $award)
                  <div class="col-md-2">
                    <a href="#">
                      <div class="card mb-3 border-0" style="height: 100px;">
                        <div class="d-flex align-self-center my-3">
                          <img class="p-2" src="{{asset('images/' . $award['img'] .'')}}" width="{{$award['width']}}" alt="">
                        </div>
                      </div>
                      <p class="card-title text-center">{{$award['title']}}</p>
                    </a>
                  </div>
                @endforeach
              </div>
            </section>
        </div>
    </div>
    
</div>
@endsection
