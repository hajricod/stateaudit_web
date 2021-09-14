@extends('layouts.admin')

@section('content')

<h2>{{__('Users')}}</h2>
<br>

<div id="loading" class="hide">
    <div>{{__('Loading')}} ...</div>
</div>

<div id="data-table">
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
                <th width="45%"
                    class="border-top-0 sorting" 
                    data-sorting_type="asc" 
                    data-column_name="name">
                    {{__('Name')}}
                    <span id="name_icon"></span>
                </th>
                <th width="30%" class="border-top-0">{{__('Email')}}</th>
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
        @include('admin.users.data')
        
    </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1">
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="name">
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc">
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="false">
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
</div>

@endsection

@section('script')
    
<script>
    $(document).ready(function() {

        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        $(document).on("click", ".btnDelete", function () {
            var id = $(this).data("user_id");
            var url = $(this).data("action");
            $("form#delete").attr("action", url);
            $("form#delete button#accepted").attr("data-record_id", id);
        });

        $(document).on("click", "form#delete button#accepted", function () {
            var id = $(this).data("record_id");
            var page = $('#hidden_page').val();
            $('#hidden_page').val(page);
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var per_page = $('#per_page').val();
            var search = $("#search").val();
            
            
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf_token
                }
            });

            $.ajax({
                url: "/admin/users/"+id,
                type: "delete",
                success: function(data) 
                {
                    fetch_data(page, sort_type, column_name, per_page, search)
                }
            })

            
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
                url: "/admin/users_data"+
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