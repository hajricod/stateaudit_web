@extends('layouts.admin')

@section('content')

<h2>{{__('Users')}}</h2>
<br>

@livewire('admin.users-datatable')

@endsection

@section('script')

@endsection