@extends('layouts.admin')

@section('content')

<h2>{{__('Complaints')}}</h2>

@livewire('admin.complaints-datatable')

@endsection

@section('script')

<script>
    $().ready(function() {
        $("#clearFilter").on("click", function() {
            $("input[type=checkbox]").attr('check', false);
        })
    })
</script>

@endsection