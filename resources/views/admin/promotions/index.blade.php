@extends('layouts.admin')

@section('content')

<h2>{{__('News')}}</h2>
<br>

@livewire('admin.promotions-datatable')

@endsection
