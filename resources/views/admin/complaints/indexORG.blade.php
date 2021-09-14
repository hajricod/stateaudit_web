@extends('layouts.admin')

@section('content')

<h2>{{__('Complaints')}}</h2>
<br>
<table class="table table-hover bg-white table-responsive-sm text-nowrap border">
    <thead>
        <tr>
            <th class="border-top-0" data-column_name="id">#</th>
            <th class="border-top-0" data-sorting_type="asc">{{__('Name')}}</th>
            <th class="border-top-0">{{__('Id number')}}</th>
            <th class="border-top-0">{{__('Email')}}</th>
            <th class="border-top-0">{{__('Date Received')}}</th>
            <th class="border-top-0"></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($complaints as $complaint)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$complaint->name}}</td>
                <td>{{$complaint->id_number}}</td>
                <td>{{$complaint->email}}</td>
                <td>{{$complaint->created_at->format("M j, Y, g:i A")}}</td>
                <td>
                    <button class="btn btn-link">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                        </svg>
                    </button>
                    
                    <a class="btn btn-link" href="/complaint/{{$complaint->id}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<div class="paginate-links">
    {{ $complaints->links() }} 
</div>
@endsection

@section('script')
    
{{-- <script>
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
                url: "/admin/complaint/"+id,
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
                url: "/admin/complaint_data"+
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
</script> --}}

@endsection