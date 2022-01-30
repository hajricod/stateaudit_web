<div>
    
    {{-- <select class="form-control" name="group_id" wire:change="selectedGroup($event.target.value)">
        @foreach ($groups as $group)
            <option value="{{$group->id}}">{{lang() == 'ar'? $group->title : $group->title_en}}</option>                
        @endforeach
    </select> --}}
    <br>
    <table class="table">
        
        
        <tr>
            <th>{{__('Group')}}</th>
            <th>{{__('Permissions')}}</th>
        </tr>
            
        @foreach ($groups as $group)
            <tr>
                <td>
                    {{-- <input type="checkbox" name="{{$group->id}}" > --}}
                    <label for="{{$group->id}}">{{lang() == 'ar'? $group->title : $group->title}}</label>  
                </td>
                <td>
                    @foreach ($roles as $role)
                        <input type="checkbox"
                        data-groupid="{{$group->id}}" 
                        data-roleid="{{$role->id}}"

                        @foreach ($userroles as $userrole)
                            @if ($userrole->group.$userrole->role == $group->code.$role->code)
                                checked
                            @endif
                        @endforeach
                        
                        wire:change.defer="roleCheck($event.target.dataset)"
                        >
                        <label for="{{$role->id}}">{{lang() == 'ar'? $role->title : $role->title_en}}</label>
                        
                        <br>
                    @endforeach
                </td>
            </tr>
        @endforeach
            
        {{-- <div class="col-md-6">
            @foreach ($roles as $role)
                <input type="checkbox" name="{{$role->id}}" >
                <label for="{{$role->id}}">{{lang() == 'ar'? $role->title : $role->title_en}}</label>
                <br>
            @endforeach
        </div> --}}
        {{-- <div class="col-12">
            <table class="table">
                <tr>
                    <th>user_id</th>
                    <th>group_id</th>
                    <th>role_id</th>
                </tr>
            
                @foreach ($userroles as $userrole)
                    <tr>
                        <td>{{$userrole->user_id}}</td>
                        <td>{{$userrole->group_id}}</td>
                        <td>{{$userrole->role_id}}</td>
                    </tr>
                @endforeach
            </table>
        </div> --}}
    </table>
</div>