@extends('layouts.admin')

@section('content')

<h2>{{__('Complaints')}}</h2>
<br>

{{-- <div id="loading" class="hide">
    <div>{{__('Loading')}} ...</div>
</div> --}}

{{-- <div id="data-table">
    <div class="row mb-2">
        <div class="col d-flex justify-content-between">
            <div>
                <input type="text" name="search" id="search">
                <label for="search" id="lbl_search">{{__('Search')}}</label>
            </div>
            <div class="d-flex align-items-center">
                <select name="per_page" id="per_page">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>                
            </div>
        </div>
    </div>
    
    <table class="table table-hover table-responsive-md text-nowrap">
        <thead class="bg-white border">
            <tr>
                <th width="5%" class="border-top-0" data-column_name="id">#</th>
                <th width="35%"
                    class="border-top-0 sorting" 
                    data-sorting_type="asc" 
                    data-column_name="name">
                    {{__('Name')}}
                    <span id="name_icon"></span>
                </th>
                <th width="10%" class="border-top-0">{{__('Id number')}}</th>
                <th width="20%" class="border-top-0">{{__('Email')}}</th>
                <th width="10%" 
                    class="border-top-0 sorting" 
                    data-sorting_type="asc" 
                    data-column_name="status">
                    {{__('Status')}}
                    <span id="status_icon"></span>
                </th>
                <th width="10%"
                    class="border-top-0 sorting"
                    data-sorting_type="asc" 
                    data-column_name="created_at">
                    {{__('Date Received')}}
                    <span id="created_at_icon"></span>
                </th>
                <th width="10%" class="border-top-0"></th>
            </tr>
        </thead>
        @include('admin.complaints.data')
        
    </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1">
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="name">
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc">
</div> --}}

{{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header border-0" dir="ltr">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{__('Would you like to delete this record?')}}</p>
            </div>
            <div class="modal-footer">
                <form id="delete" action="" method="post">
                    @method('delete')
                    <button type="button" class="btn btn-primary" data-dismiss="modal" data-record_id="" id="accepted">{{__('Yes')}}</button>
                </form>

                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="declined">{{__('No')}}</button>
            </div>
        </div>
    </div>
</div> --}}

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