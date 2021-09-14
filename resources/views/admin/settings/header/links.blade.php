<div id="links_section">
    <hr class="my-3">
    <h5 class="px-3">{{__('Sublinks')}}</h5>
    <table class="table table-sm bg-white" id="sublinks_table">
        @if (count($headerSublinks) > 0)
        <thead>
            <tr>
                <th colspan="3">
                    <div class="form-row align-items-center text-center">
                        <div class="col-3">
                            العنوان
                        </div>
                        <div class="col-3">
                            Title
                        </div>
                        <div class="col-4">
                            URL
                        </div>
                        <div class="col-2">
                            {{__('Actions')}}
                        </div>
                    </div>
                </th>
            </tr>
        </thead>
        @endif
        <tbody id="header_sublinks">
            @forelse ($headerSublinks as $item)
                <tr id="sublink_{{$item->id}}">
                    <td colspan="3">
                        <form action='{{url("/admin/updateHeaderSublinks/$item->id")}}' id="form_update_sublink_{{$item->id}}" method="POST">
                            <div class="form-row align-items-center">
                            @csrf
                                <div class="col-3" dir="rtl">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <input type="hidden" name="header_links_id" value="{{$item->header_links_id }}">
                                    <input type="text" class="form-control" name="title" value="{{$item->title}}">
                                </div>
                                <div class="col-3" dir="ltr">
                                    <input type="text" class="form-control" name="title_en" value="{{$item->title_en}}">
                                </div>
                                <div class="col-4" dir="ltr">
                                    <input type="text" class="form-control" name="url" value="{{$item->url}}">
                                </div>
                                <div class="col-2 text-center" dir="ltr">
                                    <div class="btn-group" role="group" aria-label="actions" dir="ltr">
                                        <div class="modal fade" id="delete_sublink_modal_{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="false">
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
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-primary  delete_sublink" 
                                                        data-id="{{$item->id}}"
                                                        data-action={{url("/admin/deleteHeaderSublink/$item->id")}} 
                                                        data-dismiss="modal">{{__('Yes')}}</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <button 
                                        data-toggle="modal" 
                                        data-target="#delete_sublink_modal_{{$item->id}}"
                                        type="button" 
                                        class="btn btn-light" 
                                        data-id="{{$item->id}}" 
                                        data-action={{url("/admin/deleteFooterSublink/$item->id")}}>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                            </svg>
                                        </button>

                                        <button type="submit" class="btn btn-light update_sublink" id="{{$item->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-save-fill text-success" viewBox="0 0 16 16">
                                                <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty 
                <tr>
                    <p class="w-100 text-center bg-white p2">{{__('Nothing found')}}!</p>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>