<div>
    <div>
        @if (session()->has('message'))
            <x-alert :message="session()->get('message')" />
        @endif
    </div>
    {{-- <div wire:loading id="loading">
        <div>{{__('Loading')}} ...</div>
    </div> --}}
    <div class="row p-1 d-flex align-items-end">
        <div class="col-md-3">
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

        <div class="col-md-9">
            <div class="form-group">
                <div class="d-flex justify-content-end">
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
                    <a wire:click.prevent="sortBy('name')" role="button" href="#">
                        {{__('Name')}}
                        @include('parts._sort-icon', ['field' => 'name'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('email')" role="button" href="#">
                        {{__('Email')}}
                        @include('parts._sort-icon', ['field' => 'email'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        {{__('Date Registered')}}
                        @include('parts._sort-icon', ['field' => 'created_at'])
                    </a>
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($feedback as $feed)
                    <tr scope="row">
                        <td>{{$feed->name}}</td>
                        <td>{{$feed->email}}</td>
                        <td>{{$feed->created_at->format("M j, Y, g:i A")}}</td>
                        <td>
                            <button 
                            class="btn btn-link btnDelete" 
                            data-toggle="modal" 
                            data-target="#deleteModal{{$feed->id}}" 
                            data-action="/admin/feedback/{{$feed->id}}">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                </svg>
                            </button>
                
                            <div class="modal fade" id="deleteModal{{$feed->id}}" tabindex="-1" role="dialog" aria-hidden="false">
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

                                            <button wire:click="delete({{$feed->id}})" type="button" class="btn btn-primary" data-dismiss="modal">
                                                {{__('Yes')}}
                                            </button>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
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
    </div>
    <div class="d-flex justify-content-between mt-4" dir="{{app()->getLocale() == 'ar'? 'ltr': ''}}">
        <div>{{ $feedback->links() }}</div>
        <div>
            {{__('Showing')}} {{$feedback->firstItem()}} {{__('To')}} {{$feedback->lastItem()}} {{__('out of')}} {{$feedback->total()}}
        </div>
    </div>
</div>