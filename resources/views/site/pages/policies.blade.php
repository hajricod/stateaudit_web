@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-white pt-5 pb-3 min-h-80">
            
            <article>
                <h4>{{lang() == 'ar' ? $folder->title : $folder->title_en}}</h4>
                <hr>
                <ul class="list-group list-group-flush pr-0 p-2">
                    @foreach ($files as $file)
                        <a class="list-group-item" href="{{asset('storage/library/'.$file->file_name)}}" target="_blank">{{$file->title}}</a>
                    @endforeach
                </ul>
            </article>
        </div>
    </div>
</div>
@endsection