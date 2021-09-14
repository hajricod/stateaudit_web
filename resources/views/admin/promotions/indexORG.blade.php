@extends('layouts.admin')

@section('content')

<h2>{{__('News')}}</h2>
<br>

<div id="loading" class="hide">
    <div>{{__('Loading')}} ...</div>
</div>

<div id="data-table">
    <div class="row mb-2">
        <div class="col d-flex justify-content-between">
            
            <div>
                @can('group-promotion',  App\Models\Group::find(Auth::user()->group_id))
                <a class="btn btn-primary rounded-circle ml-2 p-1" href="promotions/create">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
                @endcan
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
                <th width="30%"
                    class="border-top-0 sorting" 
                    data-sorting_type="asc" 
                    data-column_name="title">
                    {{__('Title')}}
                    <span id="title_icon"></span>
                </th>
                {{-- <th width="20%"
                    class="border-top-0 sorting" 
                    data-sorting_type="asc" 
                    data-column_name="description">
                    {{__('Description')}}
                    <span id="description_icon"></span>
                </th> --}}
                <th width="15%"
                    class="border-top-0 sorting" 
                    data-sorting_type="asc" 
                    data-column_name="start_on">
                    {{__('From')}}
                    <span id="from_icon"></span>
                </th>
                <th width="15%"
                    class="border-top-0 sorting" 
                    data-sorting_type="asc" 
                    data-column_name="end_on">
                    {{__('To')}}
                    <span id="to_icon"></span>
                </th>
                {{-- <th width="10%" class="border-top-0 sorting"
                    data-sorting_type="asc" 
                    data-column_name="created_at">
                    {{__('Date')}}
                    <span id="created_at_icon"></span>
                </th> --}}
                <th width="10%" class="border-top-0 sorting"
                    data-sorting_type="asc" 
                    data-column_name="status">
                    {{__('Status')}}
                    <span id="status_icon"></span>
                </th>
                {{-- <th width="20%" class="border-top-0">{{__('Image')}}</th> --}}
                <th width="10%" class="border-top-0"></th>
            </tr>
        </thead>
        @include('admin.promotions.data')
        
    </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1">
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="title">
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc">
</div>

@endsection

@section('script')
    
<script>
    $(document).ready(function() {

        $(document).on("click", "button#accepted", function () {
            var id = $(this).data("record_id");
            var page = $('#hidden_page').val();
            $('#hidden_page').val(page);
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var per_page = $('#per_page').val();
            var search = $("#search").val();
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf_token
                }
            });

            $.ajax({
                url: "/admin/promotions/"+id,
                type: "delete",
                success: function(data) 
                {
                    fetch_data(page, sort_type, column_name, per_page, search)
                }
            })

            id = "";
            
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1]
            $('#hidden_page').val(page);
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var per_page = $('#per_page').val();
            var search = $("#search").val();

            fetch_data(page, sort_type, column_name, per_page, search);
        });

        $(document).on('change', '#per_page', function(e) {
            var page = 1;
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var per_page = $('#per_page').val();
            var search = $("#search").val();

            fetch_data(page, sort_type, column_name, per_page, search);
        });

        
        
        var typingTimer;
        var doneTypingInterval = 1000;
        var page = $('#hidden_page').val();
        var column_name = $('#hidden_column_name').val();
        var sort_type = $('#hidden_sort_type').val();
        var per_page = $('#per_page').val();
        var search;

        $(document).on('keyup', '#data-table #search', function(e) {

            search = $(this).val();

            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
            
        });

        function doneTyping () {
            fetch_data(page, sort_type, column_name, per_page, search);
        }

        $(document).on('click', '.sorting', function(e) {
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            var per_page = $('#per_page').val();

            $('#data-table table thead tr th span').html('');

            if(order_type == 'asc')
            {
                $(this).data('sorting_type', 'desc');
                reverse_order = 'desc';
                $('#'+column_name+'_icon').html(`
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-down-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                </svg>`);
            }

            if(order_type == 'desc')
            {
                $(this).data('sorting_type', 'asc');
                reverse_order = 'asc';
                $('#'+column_name+'_icon').html(`
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-up-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                </svg>`);
            }

            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);

            var page = 1;
            var search = $("#search").val();

            fetch_data(page, reverse_order, column_name, per_page, search);
        });

        function fetch_data(page, sort_type, sort_by, per_page, search) {
            $('#loading').toggleClass('hide');
            $.ajax({
                url: "/admin/promotion_data"+
                "?page="+page
                +"&sortby="+sort_by
                +"&sorttype="+sort_type
                +"&perpage="+per_page
                +"&search="+search,
                contentType: "text/html",
                success: function(data) 
                {
                    $('#data-table tbody').remove();
                    $('#data-table tfoot').remove();
                    $('#data-table table').append(data);
                    $('#loading').toggleClass('hide');
                }
            })
        }

    });
</script>

@endsection