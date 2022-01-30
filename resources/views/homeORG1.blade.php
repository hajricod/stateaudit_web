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
<div class="banner">
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
  <div class="container btn-services">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <a href="/complaint/create">
          <div class="circle shadow-sm anim" data-delay="0s">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cursor-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
              </svg>
              <p>{{ __('Complaints') }}</p>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="/pages/fdgo/87">
          <div class="circle shadow-sm anim" data-delay=".5s">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z"/>
              <path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z"/>
            </svg>
            <p>{{ __('FDGO') }}</p>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="/media">
          <div class="circle shadow-sm anim" data-delay="1s">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-checklist" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
              <path fill-rule="evenodd" d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
            </svg>
            <p>{{ __('Media and Awareness Center') }}</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>

<section style="min-height: 100vh; background-color: #e3dcdc;background-image: url(../images/pattern.png);">
  <div class="section-head">
    <h4 class="section-title">{{__('Welcoming Word')}}</h4>
  </div>
  <div class="container-fluid">
    <div class="row" style="padding: 20px 0 200px 0;">
      <div class="col-md-6 offset-md-3">
        <div class="card border-0 shadow" style="min-height: 30vh" data-delay="1s">
          <div class="card-body py-5">
            @if (lang() == 'ar')
              <article style="text-align: justify">
                <p>
                    في ضوء السياسة الحكيمة لحضرة صاحب الجلالة السلطان المعظم - حفظه الله ورعاه - التي تجلت في توسيع صلاحيات جهاز الرقابة المالية للدولة لتشمل الرقابة الإدارية ، وتشريف جلالته - حفظه الله - لي برئاسة هذا الصرح الكبير ، تقديراً من جلالته بدوره ، وإيماناً منه برسالته ، فهي مسؤولية عزيزة وغالية ، وتشريفاً سامياً ، عقدنا معه العزم مع إخوتي وأخواتي منتسبي الجهاز على أن نكون أهلاً له .
                </p>
                <p>
                    فقد استوجبت المرحلة الراهنة تطوير أبعاد العمل الرقابي ، و التركيز على الأهداف التي يسعى الجهاز إلى تحقيقها ، وفي مقدمتها توفير الحماية الواجبة للأموال العامة والتحقق من استخدام الموارد بطريقة اقتصادية وبكفاءة وفاعلية ، مُلبين في ذات الوقت آمال وطموحات المجتمع في "المزيد من المساءلة والشفافية والعدالة في الأداء الحكومي".
                </p>
                <p>
                    ومن هذا المنطلق بات من الضروري على جهاز الرقابة المالية والإدارية للدولة أن يسعى إلى تطوير وتحديث وظائفه وأسلوب عمله ، واضعاً في الإعتبار المتغيرات المحلية والإقليمية والدولية.
                </p>
                <p>
                    لهذا كله وضعنا برنامجاً للعمل ومنهجية للأداء ، تقوم على المعيار العلمي وتتماشى مع الواقع العملي ، ويرتكز على ركائز جوهرية اهمها الاعتماد على روح التعاون البناء والتآزر الصادق مع الجهات الخاضعة للرقابة والمجتمع .
                </p>
                <p>
                    وقد أطل هذا الموقع بحلته الجديدة مع النافذة المهمة والتي تُعنى باستفسارات المواطنين وملاحظاتهم لتفعيل جسور التواصل بين الجهاز وكافة المواطنين والمهتمين أينما كانوا .
                </p>
              </article>
            @else
              <article>
                  <p>
                      In light of the wise and visionary leadership of His Majesty Sultan Qaboos bin Said and his deep belief in the significant role and mission of State Audit Institution (SAI), His Majesty extended its prerogatives to include administrative oversight. I consider the honor His Majesty bestowed on me to head this prestigious institution as a noble and precious responsibility and royal generosity. All the SAI staff, including myself, has undertaken to prove we are worthy of such honor.
                  </p>
                  <p>
                      The current stage calls for the development of the various aspects of oversight mechanism and more focus on the objectives SAI attempts to realize, notably the due protection of public funds and ensuring the economic, efficient and effective use of resources. At the same time, we have to fulfill the aspirations and ambitions of our society towards “more accountability, transparency, and fairness in government performance.”
                  </p>
                  <p>
                      Therefore, it has become imperative that SAI develop and update its functions and the way it operates taking into consideration the local, regional and international variables and developments.
                  </p>
                  <p>
                      At SAI, we have developed an action plan and a performance methodology based on scientific criteria and essential foundations, notably leveraging the spirit of constructive cooperation and sincere synergy with auditees and the society in such a manner that conforms to and satisfies practical reality.
                  </p>
                  <p>
                      As a part of the new approach, this new website has an important section on citizens’ enquiries and feedback in order to activate communication between SAI and all citizens and stakeholders wherever they may be.
                  </p>
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
          $delay += .5; 
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