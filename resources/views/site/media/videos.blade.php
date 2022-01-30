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
                    @if(count($videos) == 0)
                        <ul class="list-group p-0">
                            <li class="list-group-item text-center">
                                {{__('Nothing was found')}}!
                            </li>
                        </ul>
                    @endif
                    <div class="row">
                        
                        <div class="col-md-8">
                            @if (count($videos) > 0)
                                <div id="video_player">
                                    @foreach ($videos as $video)
                                        @if ($loop->index == 0)
                                            <iframe width="90%" class="responsive-iframe" src="{{$video->url}}" title="{{$video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @endif
                                    @endforeach
                                </div> 
                            @endif
                        </div>
                        <div class="col-md-4">
                            <livewire:site.videos-list :progid="$prog_id" :listid="$list_id"/>
                        </div>
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