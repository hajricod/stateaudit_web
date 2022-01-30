<div>
    <ul class="list-group px-0 mt-3" style="height: 400px; overflow-y: auto">
        {{-- @if(count($videos) == 0)
            <li class="list-group-item text-center">
                {{__('Nothing was found')}}!
            </li>
        @endif --}}
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
        {{-- <li class="list-group-item text-center">
            {{__('Nothing was found')}}!
        </li> --}}
        @endforelse

    </ul>

    @if (count($videos) > 0)
        <hr> 
    @endif

    <div dir="ltr">
        {{ $videos->onEachSide(5)->links() }} 
    </div>
</div>