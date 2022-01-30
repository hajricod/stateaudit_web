<div class="row">
    <div class="col-md-12 pb-3" id="tables">
        <h4>{{__('Header Section')}}</h4>
        <hr>

        <button class="btn btn-primary rounded-circle p-1"
        data-toggle="modal" 
        data-target="#addLinkModal" 
        data-action="">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </button>

        <div class="modal fade" id="addLinkModal" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0" dir="ltr">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/admin/addHeaderLink')}}" method="post" id="form_add_link">
                            @csrf
                            <div class="form-group">
                                <label for="header_links_id">{{__('Group')}}</label>
                                <select name="header_links_id" id="header_links_id" class="form-control">
                                    <option value="">{{__('Main')}}</option>
                                    @foreach ($headerLinks as $item)
                                        <option value="{{$item->id}}">{{lang() == 'ar' ? $item->title : $item->title_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group text-right" dir="rtl">
                                <label for="title">العنوان</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group text-left" dir="ltr">
                                <label for="title_en">Title</label>
                                <input type="text" name="title_en" class="form-control">
                            </div>
                            <div id="url" class="form-group text-left" dir="ltr">
                                <label for="url">{{__('URL')}}</label>
                                <input type="text" name="url" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add_link">{{__('Save')}}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Discard')}}</button>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mb-3">
        <h5 class="px-3">{{__('Links')}}</h5>
        <table class="table table-sm bg-white" id="link_table">
            <thead>
                <tr class="text-center">
                    <th></th>
                    <th>العنوان</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>{{__('Sort')}}</th>
                    <th>{{__('Status')}}</th>
                    <th>{{__('Actions')}}</th> 
                </tr>
            </thead>
            <tbody id="header_links">
                @foreach ($headerLinks as $item)
                    <tr id="link_{{$item->id}}">
                        <td class="text-center">
                            <input type="radio" name="id" class="" id="{{$item->id}}" value="{{$item->id}}" style="width: 15px">
                        </td>
                        <td>
                            <div class="group-control">
                                <input type="text" class="form-control" name="title" value="{{$item->title}}" dir="rtl">
                            </div>
                        </td>
                        <td>
                            <div class="group-control">
                                <input type="text" class="form-control" name="title_en" value="{{$item->title_en}}" dir="ltr">
                            </div>
                        </td>
                        <td>
                            <div class="group-control">
                                <input type="text" class="form-control" name="url" value="{{$item->url}}" dir="ltr">
                            </div>
                        </td>
                        <td style="width: 100px">
                            <div class="group-control">
                                <input type="number" class="form-control" name="sort" value="{{$item->sort}}" dir="ltr">
                            </div>
                        </td>
                        <td>
                            <div class="group-control">
                                <select wire:change="changeStatus($event.target.value, {{$item->id}})" class="form-control w-fit">
                                    <option value="{{$item->status}}" {{$item->status == 0 ? 'selected': ''}}>
                                        {{ __('Off')}}
                                    </option>
                                    <option value="{{$item->status}}" {{$item->status == 1 ? 'selected': ''}}>
                                        {{ __('Active')}}
                                    </option>
                                </select>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" role="group" aria-label="actions" dir="ltr">

                                <button 
                                class="btn btn-light btnDelete" 
                                data-toggle="modal" 
                                data-target="#delete_link_modal_{{$item->id}}"
                                type="button">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                    </svg>
                                </button>

                                <div class="modal fade" id="delete_link_modal_{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="false">
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
                                                class="btn btn-primary delete_link" 
                                                data-id="{{$item->id}}" 
                                                data-action={{url("/admin/deleteHeaderLink/$item->id")}} 
                                                data-dismiss="modal">{{__('Yes')}}</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button wire:click="updateRecord()" type="buttom" class="btn btn-light" id="{{$item->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-save-fill text-success" viewBox="0 0 16 16">
                                        <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                                        </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        
        <div class="d-none justify-content-center" id="spinner">
            <div class="spinner-border text-primary text-center" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>
        
    </div>
</div>