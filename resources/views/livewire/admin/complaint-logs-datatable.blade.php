<div>
    <div>
        @if (session()->has('message'))
            <x-alert :message="session()->get('message')" />
        @endif
    </div>

    <div class="row p-1 d-flex align-items-end">
        <div class="col-md-4">
            <div class="form-group">
                <div class="d-flex">
                    <input type="text" wire:model="search" class="form-control w-100" placeholder="{{__('Search')}}">
                    <button wire:click="clear" class="btn bg-transparent p-1 shadow-none" style="margin-{{app()->getLocale() == 'ar'? 'right':'left'}}: -40px; z-index: 100;">                  
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1rem" fill="currentColor" class="bi bi-x text-black-50" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                </div>  
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label class="d-inline" for="from_date">{{__('From')}}</label>
                <input wire:model="fromDate" class="form-control d-inline-block" type="date" name="from_date" id="from_date">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="d-inline" for="to_date">{{__('To')}} </label>
                <input wire:model="toDate" class="form-control d-inline-block" type="date" name="to_date" id="to_date"> 
            </div>
        </div> --}}
        <div class="col-md-8">
            {{-- <div class="modal fade" id="deleteRecordsModal" tabindex="-1" role="dialog" aria-hidden="false">
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

                            <button wire:click="deleteRecords()" type="button" class="btn btn-primary" data-dismiss="modal">
                                {{__('Yes')}}
                            </button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="form-group">
                <div class="d-flex justify-content-end">
                    {{-- <button wire:click="resetFilter()" class="btn btn-sm btn-primary mx-2" id="clearFilter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                        </svg>
                    </button>

                    @if (userRole('complaint.delete'))
                        <button class="btn btn-sm btn-danger mx-2" data-toggle="modal" data-target="#deleteRecordsModal" {{count($itemsSelected) > 0? '' : 'disabled'}}>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                    @endif --}}

                    <select wire:model="perPage" class="form-control w-auto" name="perPage" id="perPage">
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                    </select>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table mb-0 table-hover bg-white border">
            <thead>
            <tr>
                <th>
                    <a wire:click.prevent="sortBy('user_name')" role="button" href="#">
                        {{__('Name')}}
                        @include('parts._sort-icon', ['field' => 'user_name'])
                    </a>
                </th>
                {{-- <th>
                    <a wire:click.prevent="sortBy('user_id')" role="button" href="#">
                        {{__('User')}}
                        @include('parts._sort-icon', ['field' => 'user_id'])
                    </a>
                </th> --}}
                <th>
                    <a wire:click.prevent="sortBy('complaint_id')" role="button" href="#">
                        {{__('Complaint')}}
                        @include('parts._sort-icon', ['field' => 'complaint_id'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('action')" role="button" href="#">
                        {{__('Action')}}
                        @include('parts._sort-icon', ['field' => 'action'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
                        {{__('Updated Date')}}
                        @include('parts._sort-icon', ['field' => 'updated_at'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        {{__('Created Date')}}
                        @include('parts._sort-icon', ['field' => 'created_at'])
                    </a>
                </th>
                
                {{-- <th></th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach ($complaintLogs as $complaintLog)

                    <tr scope="row">
                        <td> 
                            <a href="/admin/users/{{$complaintLog->user_id}}">{{$complaintLog->user_name}}</a>
                        </td>
                        {{-- <td>{{$complaintLog->user_id}}</td> --}}
                        <td>{{$complaintLog->complaint_id}}</td>
                        <td>{{__($complaintLog->action)}}</td>
                        <td>{{$complaintLog->updated_at->format("M j, Y, g:i A")}}</td>
                        <td>{{$complaintLog->created_at->format("M j, Y, g:i A")}}</td>
                        {{-- <td>{{$complaintLog->created_at->format("M j, Y, g:i A")}}</td> --}}
                        {{-- <td>
                            @if (userRole('complaint.delete'))
                            <button 
                            class="btn btn-link btnDelete" 
                            data-toggle="modal" 
                            data-target="#deleteModal{{$complaintLog->id}}" 
                            data-action="/admin/complaint/{{$complaintLog->id}}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </button>
                
                            <div class="modal fade" id="deleteModal{{$complaintLog->id}}" tabindex="-1" role="dialog" aria-hidden="false">
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

                                            <button wire:click="delete({{$complaintLog->id}})" type="button" class="btn btn-primary" data-dismiss="modal">
                                                {{__('Yes')}}
                                            </button>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if (userRole('complaint.view'))
                            <a class="btn btn-link" href="#">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                            @endif
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between mt-4" dir="{{app()->getLocale() == 'ar'? 'ltr': ''}}">
        <div>{{ $complaintLogs->links() }}</div>
        <div>
            Showing {{$complaintLogs->firstItem()}} to {{$complaintLogs->lastItem()}} out of {{$complaintLogs->total()}}
        </div>
    </div>
</div>
