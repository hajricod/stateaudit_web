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
                    @can('group-promotion',  App\Models\Group::find(Auth::user()->group_id))
                        <a class="btn btn-primary rounded-circle ml-2 p-1" href="promotions/create">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </a>
                    @endcan

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
                    <a wire:click.prevent="sortBy('title')" role="button" href="#">
                        {{__('Name')}}
                        @include('parts._sort-icon', ['field' => 'title'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('start_on')" role="button" href="#">
                        {{__('From')}}
                        @include('parts._sort-icon', ['field' => 'start_on'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('end_on')" role="button" href="#">
                        {{__('To')}}
                        @include('parts._sort-icon', ['field' => 'end_on'])
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        {{__('Date')}}
                        @include('parts._sort-icon', ['field' => 'created_at'])
                    </a>
                </th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($promotions as $promotion)
                    <tr scope="row">
                        <td>{{$promotion->title}}</td>
                        <td>{{$promotion->start_on->format("M j, Y, g:i A")}}</td>
                        <td>{{$promotion->end_on->format("M j, Y, g:i A")}}</td>
                        <td>{{$promotion->created_at->format("M j, Y, g:i A")}}</td>
                        <td>
                            <button 
                            class="btn btn-link btnDelete" 
                            data-toggle="modal" 
                            data-target="#deleteModal{{$promotion->id}}" 
                            data-action="/admin/promotions/{{$promotion->id}}">
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

                                            <button wire:click="delete({{$promotion->id}})" type="button" class="btn btn-primary" data-dismiss="modal">
                                                {{__('Yes')}}
                                            </button>

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
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
        </table>
    </div>
    <div class="d-flex justify-content-between mt-4" dir="{{app()->getLocale() == 'ar'? 'ltr': ''}}">
        <div>{{ $promotions->links() }}</div>
        <div>
            {{__('Showing')}} {{$promotions->firstItem()}} {{__('To')}} {{$promotions->lastItem()}} {{__('out of')}} {{$promotions->total()}}
        </div>
    </div>
</div>