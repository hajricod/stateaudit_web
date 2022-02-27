<div class="container">
    <div class="row">
        <div class="col-md-12 pb-3 min-h-80">
            <h4>{{__('News')}}</h4>
            <hr>
            <div class="row d-flex align-items-end">
                <div class="col-md-4">
                    <div class="mb-3">
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
                
                <div class="col-md-8 d-flex justify-content-end">
                    <div class="form-group mx-2">
                        <label for="year">{{__('Type')}}</label>
                        <select wire:model="type" class="form-control w-auto d-inline-block" id="type" name="type">
                            <option selected value="">{{__('All')}}</option>
                            <option value="news">{{lang() == 'ar' ? 'خبر' : __('News')}}</option>
                            <option value="statement"> {{__('Statement')}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="year">{{__('Year')}}</label>
                        <select wire:model="year" class="form-control w-auto d-inline-block" id="year" name="year">
                            <option selected value="">{{__('All')}}</option>

                            @foreach ($years as $year)
                                <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                    </div>                    
                </div>
            </div>

            <hr>

            <div class="min-h-50">
                <ul class="list-group list-group-flush p-0">
                    @forelse ($news as $new)
                        <a href="/news/{{$new->id}}" class="list-group-item list-group-item-action bg-transparent">
                            <div class="row">
                                <div class="col-md-4">
                                    <img
                                    class="w-100"
                                    src="{{asset("storage/news/$new->image")}}" 
                                    alt="{{app()->getLocale() == 'ar'? $new->title : $new->title_en}}">
                                </div>
                                <div class="col-md-8 p-3">
                                    @if (app()->getLocale() == 'ar')
                                    <h5>{{Str::limit($new->title, 100)}}</h5>
                                    @else
                                        <h5>{{Str::limit($new->title_en, 100)}}</h5>
                                    @endif
                                    <p>{{$new->created_at->format('Y-m-d')}}</p>
                                </div>
                            </div>
                        </a>
                            
                        @empty
                            <li class="list-group-item list-group-item-warning text-center">
                                {{__('Nothing was found')}}!
                            </li>
                    @endforelse
                </ul>
            </div>
            <hr>
            <div class="d-flex justify-content-between mt-4" dir="{{app()->getLocale() == 'ar'? 'ltr': ''}}">
                <div>{{ $news->links() }}</div>
                <div>
                    {{__('Showing')}} {{$news->firstItem()}} {{__('To')}} {{$news->lastItem()}} {{__('out of')}} {{$news->total()}}
                </div>
            </div>
        </div>
    </div>
</div>