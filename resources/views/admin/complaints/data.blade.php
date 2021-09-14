<tbody class="bg-white border">
@foreach ($complaints as $complaint)
    <tr>
        <td>{{$loop->index + $complaints->firstItem()}}</td>
        <td>{{$complaint->name}}</td>
        <td>{{$complaint->id_number}}</td>
        <td>{{$complaint->email}}</td>
        <td>
            @switch($complaint->status)
                @case('1')
                    {{__('On progress')}}
                    @break

                @case('2')
                    {{__('Archived')}}
                    @break

                @default
                    {{__('New')}}
            @endswitch
        </td>
        <td>{{$complaint->created_at->format("M j, Y, g:i A")}}</td>
        <td>
            <button 
            class="btn btn-link btnDelete" 
            data-toggle="modal" 
            data-target="#deleteModal{{$complaint->id}}" 
            data-action="/admin/complaint/{{$complaint->id}}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </button>

            <div class="modal fade" id="deleteModal{{$complaint->id}}" tabindex="-1" role="dialog" aria-hidden="false">
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
                            <button type="button" class="btn btn-primary" data-dismiss="modal" data-record_id="{{$complaint->id}}" id="accepted">{{__('Yes')}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="declined">{{__('No')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <a class="btn btn-link" href="/admin/complaint/{{$complaint->id}}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>
            </a>
        </td>
    </tr>
@endforeach
</tbody>
<tfoot>
    <tr>
        <td colspan="7" class="p-0 py-3">
            <div style="direction: ltr">
                <div class="row">
                    <div class="col-md-6">
                        {!! $complaints->links() !!} 
                    </div>
                    <div class="col-md-6 {{app()->getLocale() == 'en' ? 'text-right' : ''}}">
                        {{__('Showing')}} {{$complaints->firstItem()}} {{__('to')}} {{$complaints->lastItem()}} {{__('of')}} {{$complaints->total()}}
                    </div>
                </div>
            </div>
        </td>
    </tr>
</tfoot>

