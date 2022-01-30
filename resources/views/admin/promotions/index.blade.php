@extends('layouts.admin')

@section('content')

<h2>{{__('Promotions')}}</h2>
<br>

@livewire('admin.promotions-datatable')

@endsection
