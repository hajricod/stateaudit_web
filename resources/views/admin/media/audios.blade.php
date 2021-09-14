@extends('layouts.admin')

@section('style')

<style>
#audio_player {
  position: relative;
  overflow: hidden;
  width: 100%;
  /* padding-top: 56.25%; */
}

.responsive-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}
</style>

@endsection

@section('content')

<div class="row">
    <div class="col p-0">
        <div class="card border-0 rounded">
            <div class="card-body">
                <div class="d-flex justify-cotent-start align-items-center">
                    <x-add-button url='/admin/audios/create?id={{$program->id}}' />
                    <h3>{{$program->title}}</h3>
                </div>
                <hr>
                @if (count($audios) > 0)
                    <div id="audio_player">
                        @foreach ($audios as $audio)
                            @if ($loop->index == 0)
                                {{-- <iframe width="100%" class="responsive-iframe" src="{{$audio->url}}" title="{{$audio->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

                                <audio class="w-100" controls controlsList="nodownload">
                                    <source src="{{asset("storage/audio/$audio->file")}}" type="audio/mpeg">
                                </audio>
                            @endif
                        @endforeach
                    </div>
                @endif
                
                <ul class="list-group px-0 mt-3">
                    @forelse ($audios as $audio)

                    <div class="row m-1 bg-light rounded" dir="{{app()->getLocale() == 'ar' ? 'rtl' : ''}}">
                        <div class="col-12 col-md-10 col-sm-8 p-0">
                            <button 
                            type="button" 
                            class="btn btn-light btn-block text-dark video_btn list-group-item-action d-flex justify-content-between align-items-center" data-path="{{asset("storage/audio/$audio->file")}}">
                                <div>
                                    <p class="m-0">
                                        <span class="rounded-circle bg-primary text-light mx-1 text-center d-inline-block p-1" style="height: 30px; width: 30px">
                                            {{$audio->rank}}
                                        </span>
                                        {{$audio->title}}
                                    </p>
                                    <p class="m-0 mt-2">{{$audio->created_at->format("M j, Y")}}</p> 
                                </div>
                            </button>
                        </div>
                        <div class="col-12 col-md-2 col-sm-4 p-0 d-flex justify-content-end align-items-center">
                            <button class="btn shadow-none"
                            data-toggle="modal" data-target="#deleteModal{{$audio->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>

                            <a href="/admin/audios/{{$audio->id}}/edit" class="btn shadow-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-primary" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>

                            <div class="modal fade" id="deleteModal{{$audio->id}}" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0" dir="ltr">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{__('Would you like to delete this record?')}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="/admin/audios/{{$audio->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-primary">{{__('Yes')}}</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    @empty
                    <li class="list-group-item text-center">
                        {{__('Nothing was found')}}!
                    </li>
                    @endforelse

                </ul>
                
                @if (count($audios) > 0)
                    <hr> 
                @endif

                <div dir="ltr">
                    {{ $audios->onEachSide(5)->links() }} 
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
            $("audio").remove();
            var path = $(this).data("path");
            $("#audio_player").append(`
            <audio class="w-100" controls controlsList="nodownload">
                <source src="`+path+`" type="audio/mpeg">
            </audio>
            `)
        });
    });
</script>
@endsection