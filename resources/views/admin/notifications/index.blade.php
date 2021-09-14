@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3">
            <h4>{{__('Notifications')}}</h4>
            @if (count($notificationList) > 0)
                
            <table class="table table-sm" id="link_table">
                <thead class="bg-white">
                    <tr class="text-center">
                        <th>{{__('Status')}}</th>
                        <th>{{__('Title')}}</th>
                        <th>{{__('Date')}}</th>
                        <th>{{__('Actions')}}</th> 
                    </tr>
                </thead>
                <tbody id="header_links" class="bg-white">
                    @foreach ($notificationList as $notify)
                        <tr class="text-center">
                            <td >
                                @if ($notify->status)
                                <form action="/admin/notifications/{{$notify->id}}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="status" value="0">
                                    <button class="btn btn-link" type="submit">
                                        <span class="badge badge-pill">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-dot text-success" viewBox="0 0 16 16">
                                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                            </svg>
                                        </span>
                                    </button>
                                </form>
                                @else
                                    {{-- <span class="badge badge-pill">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="#ccc" class="bi bi-dot" viewBox="0 0 16 16">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                        </svg>
                                    </span> --}}
                                    <form action="/admin/notifications/{{$notify->id}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="status" value="1">
                                        <button class="btn btn-link" type="submit">
                                            <span class="badge badge-pill">
                                                <span class="badge badge-pill">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="#ccc" class="bi bi-dot" viewBox="0 0 16 16">
                                                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                                    </svg>
                                                </span>
                                            </span>
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                {{ app()->getLocale() == 'ar'? $notify->title : $notify->title_en}}
                            </td>
                            <td>
                                {{$notify->created_at->format("M j, Y, g:i A")}}
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="actions" dir="ltr">
                                    <form action="/admin/notifications/{{$notify->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    
                                    {{-- <button type="submit" class="btn btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-save-fill text-success" viewBox="0 0 16 16">
                                            <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                                            </svg>
                                    </button> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="pt-3">
                            <div style="direction: ltr">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! $notificationList->links() !!} 
                                    </div>
                                    <div class="col-md-6 {{app()->getLocale() == 'en' ? 'text-right' : ''}}">
                                        {{__('Showing')}} {{$notificationList->firstItem()}} {{__('to')}} {{$notificationList->lastItem()}} {{__('of')}} {{$notificationList->total()}}
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
                
            @else
                <p class="text-center p-3 bg-white">
                    {{__('Nothing found')}}!
                </p>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')

{{-- <script>
    $().ready(function(){
        $("input[type='radio']").on("change", function() {
            $("div#spinner").addClass("d-flex");
            $('#links_section').remove();
            $("input[type='radio']").prop('checked', false);
            $(this).prop('checked', true);

            var id = $(this).find("input[name='id']").val();
            var title = $(this).find("input[name='title']").val();
            var title_en = $(this).find("input[name='title_en']").val();

            var data = {
                "id":id,
                "title": title,
                "title_en": title_en
            }

            $.ajax({
                type: "GET",
                url: "/admin/headerSublinks",
                data: $(this).serialize(),
                success: function (data) {
                    $("div#spinner").removeClass("d-flex");
                    $('#links_section').remove();
                    $('#tables').append(data);

                }
            });

        });

    })
</script> --}}
@endsection