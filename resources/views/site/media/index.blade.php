@extends('layouts.app')

@section('style')

<style>
.list {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    overflow-x: hidden;
    overflow-y: hidden;
    height: 0;
    width: 100%;
    transition: height .5s, overflow 2s ease-in-out;
    z-index: 2;
}

.card:hover .list {
    height: 150px;
    overflow-y: auto;
}

.card-backdrop {
    position: absolute;
    background-color: rgba(0, 0, 0, 0.0);
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    transition: background-color .5s ease-in-out
}

.card:hover .card-backdrop {
    background-color: rgba(0, 0, 0, 0.3);
}
</style>

@endsection

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3">
            <h4>{{__('Media and Awareness Center')}}</h4>
            <hr>
            <div class="row">
                @foreach ($programCategoriesLists as $programCateList)
                    <div class="col-lg-4 col-md-6 p-0 section" style="position: relative">
                        <div class="card m-1 mb-3" style="position: relative">
                            @if (count($programCateList['list']) > 0)
                                <div class="card-backdrop d-none d-md-block d-lg-block"></div>                                
                                <ul class="list-group list-group-flush list p-0 d-none d-md-block d-lg-block bg-white border-0">
                                    @foreach ($programCateList['list'] as $item)
                                        @if ($item['url'] == '/news')
                                            <a class="list-group-item list-group-item-action" href="{{$item['url']}}">{{$item['title']}}</a>
                                        @else
                                            <a class="list-group-item list-group-item-action" href="{{$item['url']}}/{{$item['id']}}">{{$item['title']}}</a>
                                        @endif
                                        
                                    @endforeach
                                </ul>
                            @endif
                            <a href="{{$programCateList['cate']['url'] == '#'? '' : url("".$programCateList['cate']['url'])}}" class="list-group-item-action">
                                <img class="card-img-top" src="{{asset("/images/media_block$loop->index.jpg")}}" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <h5 class="card-text text-center {{count($programCateList['list']) == 0 ? 'p-1' : ''}}">{{$programCateList['cate']['title']}}</h5>
                                @if (count($programCateList['list']) > 0)
                                    <ul class="list-group list-group-flush p-0 d-block d-lg-none d-md-none">
                                        <hr>
                                        @foreach ($programCateList['list'] as $item)
                                            @if ($item['url'] == '/news')
                                                <a class="list-group-item list-group-item-action" href="{{$item['url']}}">{{$item['title']}}</a>
                                            @else
                                                <a class="list-group-item list-group-item-action" href="{{$item['url']}}/{{$item['id']}}">{{$item['title']}}</a>
                                            @endif
                                            
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection