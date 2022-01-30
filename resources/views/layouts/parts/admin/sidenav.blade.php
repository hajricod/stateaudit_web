<div id="backdrop"></div>

<div class="menu-icon">
    <div class="menu-bar"></div>
</div>

<div class="bg-white shadow-sm" id="side-nav">
    <div class="header">
        <h3 class="text-center p-3">{{__('Menu')}}</h3>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <a href="/admin/dashboard" class="btn btn-light btn-block text-dark">{{__('Dashboard')}}</a>
            </div>
        </div>
    </div>


    <div class="side-nav-content" style="position: relative">
        <ul class="list-group-flush p-0 side-nav-list my-2" id="sidebar">
            
            @if(userRole('complaint.view'))
                <li class="list-group-item">
                    <a href="/admin/complaint">{{__('Complaints')}}</a>
                </li>
            @endif

            {{-- @can('group-media',  App\Models\Group::find(Auth::user()->group_id))
            @endcan --}}

            @if(userRole('media.view'))
                <li class="list-group-item p-0">
                    <a href="#news" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action border-0">
                        {{app()->getLocale() == 'ar'? __('Media and Awareness Center') : Str::limit(__('Media and Awareness Center'), 20, ' ...')}}
                        
                        <svg width="1em" height="1em" viewBox="0 0 16 16" 
                        class="bi bi-caret-up-fill arowNav 
                        {{app()->getLocale() == 'ar'? 'float-left' : 'float-right'}}" 
                        fill="currentColor" 
                        xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>
                    </a>
                    <ul class="collapse pr-0 px-2 list-group-flush" id="news">
                        <li class="list-group-item">
                            <a href="/admin/news">{{__('News')}}</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/media">{{__('Media Content Managment')}}</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/faq">{{__('FAQ')}}</a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/feedback">{{__('Feedback')}}</a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (userRole('standards.view'))
                <li class="list-group-item">
                    <a href="/admin/standards">{{__('Audit Manuals and Standards')}}</a>
                </li>
            @endif

            @if(userRole('admin.view'))
                <li class="list-group-item">
                    <a href="/admin/users">{{__('Users')}}</a>
                </li>
            
                <li class="list-group-item">
                    <a href="/admin/library">{{__('Library Manager')}}</a>
                </li>
            @endif
            
            @if(userRole('public.view'))
                <li class="list-group-item">
                    <a href="/admin/employees">{{__('Employees Section')}}</a>
                </li>
            @endif
        </ul>
    </div>
    
    <div class="footer" style="position: absolute; width:100%;">
        @if(userRole('admin.view'))
            <a class="btn btn-light btn-block p-2 text-dark text-center" href="{{route('settings')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                </svg>
                {{__('Settings')}}
            </a>
        @endif
    </div>
</div>