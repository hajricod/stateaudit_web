@extends('layouts.admin')

@section('content')

<h2>{{__('Feedback')}}</h2>
<br>
@if (count($feedback) > 0)      
    <table class="table table-hover bg-white table-responsive-sm text-nowrap border">
        <thead>
            <tr>
                <th class="border-top-0" data-column_name="id">#</th>
                <th class="border-top-0" data-sorting_type="asc">{{__('Name')}}</th>
                <th class="border-top-0">{{__('Email')}}</th>
                <th class="border-top-0">{{__('Date Received')}}</th>
                <th class="border-top-0"></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($feedback as $feed)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$feed->name}}</td>
                    <td>{{$feed->email}}</td>
                    <td>{{$feed->created_at->format("M j, Y, g:i A")}}</td>
                    <td>
                        <form action="/admin/feedback/{{$feed->id}}" method="POST" class="d-inline-block" id="form_{{$feed->id}}">
                            @csrf
                            @method('delete')
                        
                            
                        </form>

                        <button class="btn btn-link" data-form="form_{{$feed->id}}" data-toggle="modal" data-target="#deleteModal" id="btnDel">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                            </svg>
                        </button>

                        <a class="btn btn-link" href="/admin/feedback/{{$feed->id}}">
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
                    <button type="button" class="btn btn-primary" id="accepted" data-foo="1">{{__('Yes')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="declined">{{__('No')}}</button>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-warning text-center" role="alert">
        {{__('Nothing found')}}!
    </div>     
@endif



<div class="paginate-links">
    {{ $feedback->links() }} 
</div>
@endsection

@section('script')
<script>
    $().ready(function(){
        $('button#btnDel').on('click', function() {
            $('button#accepted').data('form', $(this).data('form'));
            console.log($('#accepted').data('form'));
        })

        $('button#accepted').on('click', function(){
            $(this).attr('disabled', true);
            $('form#'+$(this).data('form')).submit();
        })
    })
</script>
@endsection