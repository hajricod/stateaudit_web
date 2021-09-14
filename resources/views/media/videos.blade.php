@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col p-0">
            <div class="card border-0 rounded">
                <div class="card-body">
                    <div class="d-flex justify-cotent-start align-items-center">
                        @if ($list)
                            <h3>{{$program->title}} / {{$list->title}}</h3>
                        @else
                            <h3>{{$program->title}}</h3>
                        @endif
                    </div>
                    <hr>
                    @if (count($videos) > 0)
                        <div id="video_player">
                            @foreach ($videos as $video)
                                @if ($loop->index == 0)
                                    <iframe width="100%" class="responsive-iframe" src="{{$video->url}}" title="{{$video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endif
                            @endforeach
                        </div> 
                    @endif
                    
                    
                    <ul class="list-group px-0 mt-3">
                        @forelse ($videos as $video)
                            <button 
                            type="button" 
                            class="btn btn-light btn-block text-dark video_btn list-group-item-action d-flex justify-content-between align-items-center" data-url="{{$video->url}}">
                                <div>
                                    <p class="m-0">
                                        <span class="rounded-circle bg-primary text-light mx-1 text-center d-inline-block p-1" style="height: 30px; width: 30px">
                                            {{$video->rank}}
                                        </span>
                                        {{$video->title}}
                                    </p>
                                    <p class="m-0 mt-2">{{$video->created_at->format("M j, Y")}}</p> 
                                </div>
                            </button>
                        @empty
                        <li class="list-group-item text-center">
                            {{__('Nothing was found')}}!
                        </li>
                        @endforelse
    
                    </ul>
    
                    
                    {{-- <ul class="list-group px-0 mt-3 ">
                        @forelse ($videos as $video)
    
                        @empty
                        <li class="list-group-item text-center">
                            {{__('Nothing was found')}}!
                        </li>
                        @endforelse
    
                    </ul> --}}
                    
                    @if (count($videos) > 0)
                        <hr> 
                    @endif
    
                    <div dir="ltr">
                        {{ $videos->onEachSide(5)->links() }} 
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function() {    

        $(".video_btn").on('click', function() {
            $(".video_btn").removeClass("active");
            $(this).toggleClass("active");
            $("iframe").remove();
            var url = $(this).data("url");
            $("#video_player").append(`
            <iframe width="100%" src="`+url+`" class="responsive-iframe" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            `)
        });
    });
</script>
@endsection