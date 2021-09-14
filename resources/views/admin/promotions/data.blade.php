<tbody class="bg-white border">
@foreach ($promotions as $promotion)
    <tr>
        <td>
            {{$loop->index + $promotions->firstItem()}}
        </td>
        <td>{{ Str::limit( app()->getLocale() == 'ar' ? $promotion->title : $promotion->title_en, 50)}}</td>
        <td>{{$promotion->start_on->format("M j, Y, g:i A")}}</td>
        <td>{{$promotion->end_on->format("M j, Y, g:i A")}}</td>
        <td>{{round((strtotime($promotion->end_on) - time()) / (60 * 60 * 24)) > 0 ? 'Active' : 'Expired' }}</td>
        <td>
            @can('group-promotion',  App\Models\Group::find(Auth::user()->group_id))
            <button 
            class="btn btn-link btnDelete" 
            data-toggle="modal" 
            data-target="#deleteModal{{$promotion->id}}" 
            data-action="promotion/{{$promotion->id}}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </button>

            <div class="modal fade" id="deleteModal{{$promotion->id}}" tabindex="-1" role="dialog" aria-hidden="false">
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
                            <button type="button" class="btn btn-primary" data-dismiss="modal" data-record_id="{{$promotion->id}}" id="accepted">{{__('Yes')}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="declined">{{__('No')}}</button>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            
            <a class="btn btn-link" href="/admin/promotions/{{$promotion->id}}">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>
            </a>

            @can('group-promotion',  App\Models\Group::find(Auth::user()->group_id))
            <a class="btn btn-link" href="/admin/promotions/{{$promotion->id}}/edit">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square text-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </a>
            @endcan
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
                        {!! $promotions->links() !!} 
                    </div>
                    <div class="col-md-6 {{app()->getLocale() == 'en' ? 'text-right' : ''}}">
                        {{__('Showing')}} {{$promotions->firstItem()}} {{__('to')}} {{$promotions->lastItem()}} {{__('of')}} {{$promotions->total()}}
                    </div>
                </div>
            </div>
        </td>
    </tr>
</tfoot>

