@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col p-0">
            <div class="card border-0 rounded">
                <div class="card-body">
                    <div class="d-flex justify-cotent-start align-items-center">
                        <h3>{{$program->title}}</h3>
                    </div>
                    <hr>
                    <x-files-list :files="$files" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection