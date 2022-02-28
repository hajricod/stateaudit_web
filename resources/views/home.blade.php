@extends('layouts.app')

@section('style')

<style>

  .anim {
    opacity: 0;
    transform: translateY(-30px);
  }

  .anim2 {
    animation: slowdown 2s forwards ease-out;
    animation-delay: 1s;
  }

  @keyframes slowdown {
    from {
        transform: translateY(-30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
  }
</style>

@endsection
@section('banner')
<div class="banner position-relative">
  <div class="position-absolute d-none d-sm-block" 
  style="
    z-index: 2;
    bottom: 5%;
    width: 100%;
    height: 100px;
    ">
    <div class="d-flex justify-content-between align-items-center h-100 px-5">
      <div>
        1
      </div>
      <div>
        <p class="mb-2 text-light text-center">{{__('Toll Free')}}</p>
        <div class="d-flex align-items-center">
          <span class="bg-white p-1 {{lang() == 'ar'? 'ps-4 pe-2':'pe-4 ps-2'}}" style="
          margin-{{lang() == 'ar'? 'left':'right'}}: -20px; 
          z-index:0; 
          border-radius: {{lang() == 'ar'? '0 50px 50px 0px':'50px 0 0px 50px'}};"
          >80000008</span>
          <a href="tel:+96880000008" class="btn rounded-circle btn-success" style="z-index:1;">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="2em" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div id="carouselNews" class="carousel slide carousel-fade h-100" data-bs-ride="" style="direction: ltr!important">
      <ol class="carousel-indicators">
        @foreach ($news as $new)
          <li data-bs-target="#carouselNews" data-bs-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active' : ''}}"></li>
        @endforeach
      </ol>
      <div class="carousel-inner h-100">
        @foreach ($news as $new)
            <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}} h-100" style='background-image: url({{asset("storage/news/$new->image")}})'>
              <a class="d-block d-md-none h-100" href='{{url("/news/$new->id")}}' style="background-color: rgb(0 0 0 / 50%);">
                <div class="carousel-caption d-none d-md-block news-slider">
                  <h5>{{ app()->getLocale() == 'ar' ? $new->title : $new->title_en}}</h5>
                </div>
              </a>
              <div class="d-none d-md-block h-100" style="background-color: rgb(0 0 0 / 50%);">
                <div class="carousel-caption d-none d-md-block news-slider">
                  <a class="text-decoration-none text-light" href="{{url("/news/$new->id")}}">
                    <h5>{{ app()->getLocale() == 'ar' ? $new->title : $new->title_en}}</h5>
                  </a>
                </div>
              </div> 
            </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselNews" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        {{-- <span class="sr-only">Previous</span> --}}
      </a>
      <a class="carousel-control-next" href="#carouselNews" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        {{-- <span class="sr-only">Next</span> --}}
      </a>
  </div>
</div>    
@endsection

@section('content')
<section class="d-flex align-items-center justify-content-center section1 mb-5" style="min-height: 30vh; ">
  <div class="container btn-services pt-5">
    <div class="row g-2">
      @php
        $counter = 0
      @endphp

      @foreach ($big_buttons as $big_button)
        <div class="col-lg-4 col-md-6">
          <a href="{{ $big_button["url"] }}">
            <div class="circle shadow-sm anim" data-delay="{{$counter}}s">
                {!!$big_button["icon"]!!}
                <p>{{ $big_button["title"] }}</p>
            </div>
          </a>
        </div>
        @php
            $counter += 0.2;
        @endphp
      @endforeach
    </div>
  </div>
</section>

<section style="min-height: 100vh; background-color: #e3dcdc;background-image: url(../images/pattern.png);">
  <div class="section-head">
    <h4 class="section-title">{{__('About SAI')}}</h4>
  </div>
  <div class="container-fluid">
    <div class="row" style="padding: 20px 0 200px 0;">
      <div class="col-md-5 offset-md-1">
        <div class="card border-0 shadow" style="min-height: 30vh;" data-delay="1s">
          <div class="card-body py-5">
            @if (lang() == 'ar')
              <article style="text-align: justify">
                <p>
                  <b>السلام عليكم ورحمة الله تعالى وبركاته،،،</b>
                </p>
                <p>
                  يطيب لي بالأصالة عن نفسي وباسم منتسبي جهاز الرقابة المالية والإدارية للدولة أن أرحب بكم في الموقع الإلكتروني للجهاز على شبكة المعلومات الدولية (الإنترنت)، والذي يستعرض التشريعات المنظمة لعمل الجهاز، والمعلومات المتعلقة بأنشطته وأعماله ومنهجية عمله، بالإضافة إلى نوافذ الاتصال بالجهاز لتقديم المقترحات أو الاستفسارات أو الشكاوى والبلاغات، وغيرها.                  
                </p>
                <p>
                  ويُعد الموقع أحد أدوات التواصل الرئيسة التي يتيحها الجهاز لتعزيز الشراكة مع المجتمع تجسيداً لدوره بالإسهام في حماية المال العام ورفع كفاءة استخدامه وتبني ممارسات النزاهة، علاوةً على التواصل من خلال الحسابات الرسمية للجهاز في منصات التواصل الاجتماعي، وتطبيق الهواتف الذكية والبريد الإلكتروني والخط المجاني للتواصل الهاتفي، إلى جانب التواصل المباشر مع الأفراد بالوصول إلى مقر الجهاز في محافظة مسقط وأفرعه بمحافظات السلطنة، فضلاً عن اللقاءات المباشرة في الندوات التي ينفذها الجهاز، أو عبر ما يقدمه الجهاز من محتوى إعلامي وتوعوي في القوالب الإعلامية المرئية والمسموعة والإلكترونية والمطبوعة.
                </p>
                <a href="{{route('pages', 'welcome')}}">المزيد ...</a>
              </article>
            @else
              <article>
                <p>
                  <b>After compliments</b>
                </p>
                <p>
                    On my behalf and on behalf of the employees of the State Audit Institution (SAI), it is my pleasure to welcome you to SAI website, which outlines the legislations regulating SAI’s work, and all information related to its activities, and work methodology. This website also provides the communication channels through which proposals, inquires and complaints can be filed.
                </p>
                <p>
                    This website is one of the communication tools that SAI provides aiming to strengthen the partnership with the society, embodying its strong role in the protection of public fund and the adoption of integrity practices. Along with the website, SAI offers other communication channels such as social media platforms, mobile app, email, and toll-free. Individuals can also visit SAI headquarter or one of its branches in the governorates.
                </p>
                <a href="{{route('pages', 'welcome')}}">More ...</a>
              </article>
            @endif
          </div>
            <div style="margin-bottom: -180px">
              <div class="float-md-left p-2 text-center">
              <img src="{{asset('/images/nasser_mawali.jpg')}}" class="rounded-circle" width="200" height="200" alt="Nasser Al Mawali">
              @if (lang() == 'ar')
              <div class="p-2 text-center">
                  <p>
                      <b>
                          ناصر بن هلال بن ناصر المعولي 
                          <br>
                          رئيس جهاز الرقابة المالية والإدارية للدولة 
                      </b> 
                  </p>
              </div>    
              @else

              <div class="p-2 text-center">
                <p>
                    <b>
                        Nasser H.N.Al Mawali
                        <br>
                        Chairman
                        <br>
                        State Audit Institution
                    </b> 
                </p>
              </div>   

              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 d-flex align-items-center justify-content-center about-video">
        <iframe width="100%" height="60%" style="min-height: 400px" src="https://www.youtube.com/embed/2QJ69VsnLcU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</section>

<section style="min-height: 30vh;
background-color: #f1f1f1;">
  <div class="section-head">
    <h4 class="section-title">{{__('International Audit Organizations')}}</h4>
  </div>
  
  <div class="container pb-5">
    <div class="row d-flex align-items-center justify-content-center" style="height: 100%">
      @php
          $delay = 0;
      @endphp
      @foreach ($institutes as $institute)
        <div class="col-md-4 my-2">
          <a href="#">
            <div class="card w-100 mx-auto btn-orgs anim" data-delay="{{$delay}}s">
              <img class="p-2 img-fluid" src="{{asset("images/". $institute['img'] ."")}}" alt="{{$institute['title']}}">
            </div>
          </a>           
        </div>
        @php
          $delay += .2; 
        @endphp           
      @endforeach
    </div>
  </div>
</section>

<section id="awards-section">
  <div class="section-head">
    <h4 class="section-title">{{__('Rewards and Achievements')}}</h4>
  </div>
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel" style="width: 600px">
          <div class="carousel-inner">
          @foreach ($awards as $award)
            <div data-bs-slide-to="{{$loop->index}}" class="carousel-item {{$loop->index == 0 ? 'active' : ''}}" data-bs-interval="10000" style="height: 300px">
              <div class="m-auto award-circle">
                <img src="{{asset('images/' . $award['img'] .'')}}" class="d-block" alt="{{$award['title']}}" width="{{$award['width']}}" />
              </div>
              <div class="award-title">
                <h5 class="text-center py-3">{{$award['title']}}</h5>
              </div>
            </div>
          @endforeach 
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
</section>

@endsection


@section('script')
  
<script>
  const btnnn = document.querySelectorAll('.anim');

  observer = new IntersectionObserver((entries) => {

    entries.forEach(entry => {
      if(entry.intersectionRatio > 0) {
        // entry.target.classList.add('anim2');
        entry.target.style.animation = `slowdown .3s ${entry.target.dataset.delay} forwards ease-out`;
      }else {
        // entry.target.classList.remove('anim2');
        entry.target.style.animation = 'none';
      }
    });
      
  })

  btnnn.forEach(btnn => {
    observer.observe(btnn);
  })

</script>

@endsection