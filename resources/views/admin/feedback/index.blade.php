@extends('layouts.admin')

@section('content')

<h2>{{__('Feedback')}}</h2>
<br>

@livewire('admin.feedback-datatable')

@endsection
