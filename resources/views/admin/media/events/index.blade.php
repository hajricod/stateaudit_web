@extends('layouts.admin')

@section('content')

<h2>{{__('Events')}}</h2>
<br>

<livewire:admin.media-events-dataset />

@endsection
