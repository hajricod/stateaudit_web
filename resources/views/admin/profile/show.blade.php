{{-- @extends('layouts.admin')

@section('content')
    @foreach ($user as $field)
        <p>{{$field}}</p>
    @endforeach
@endsection --}}

@extends('layouts.admin')

@section('content')

{{-- @if (session()->has('message'))
    <x-toast :message="session()->get('message')" />
@endif --}}
<div class="card">
    <div class="card-body">
        <form action="/admin/profile/{{$user->id}}" method="POST">
            @csrf
            @method('put')
            <button id="edit" type="button" class="btn btn-dark rounded-circle p-1 px-2 mb-2 btn-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x d-none" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
            <div class="row">
                <div class="col-md-6 mb-1">
                    <div class="group-control">
                        <label for="name">{{__('Name')}}</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" readonly>
                        @error('name')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mb-1">
                    <div class="group-control">
                        <label for="email">{{__('Email')}}</label>
                        <p class="form-control" readonly>{{$user->email}} </p>
                    </div>
                </div>
            </div>
            <div class="row change_pass d-none">
                <div class="col-md-12">
                    <p>{{__('Change Password')}}</p>
                </div>
            </div>
            <div class="row change_pass d-none border p-1 pb-4 m-2 rounded">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">{{__('Password')}}</label>
                        <input type="password" name="password" id="password" class="form-control" readonly>
                        @error('password')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>
                                    {{__('Your password must be more than 8 characters long, should contain at least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character')}}
                                </strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">{{__('Confirm Password')}}</label>
                        <input type="password" name="password_confirmation" id="confirm" class="form-control" readonly>
                        @error('confirm')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="created_at">{{__('Date Joined')}}</label>
                        <p class="form-control" readonly>{{$user->created_at->format("M j, Y, g:i A")}} </p>
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="created_at">{{__('Group')}}</label>
                        <p class="form-control" readonly>{{$group->title}}</p>
                    </div>
                </div> --}}
            </div>
            <hr>
            <div class="row">
                
                <div class="col-sm-12 col-md-4 offset-md-4">
                    
                    <div class="form-group">
                        
                        <button type="submit" class="btn btn-primary btn-block d-none">{{__('Save')}}</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{-- <table class="table border">
                        <tr>
                            <th>{{__('Group')}}</th>
                            <th>{{__('Permissions')}}</th>
                        </tr>
                    
                        @foreach ($userRoles as $userrole)
                            <tr>
                                <td>{{$userrole->group}}</td>
                                <td>{{$userrole->role}}</td>
                            </tr>
                        @endforeach
                    </table> --}}
                    <table class="table border">
                        <tr>
                            <th>{{__('Group')}}</th>
                            <th>{{__('Permissions')}}</th>
                        </tr>
                    
                        @foreach ($permissions as $group => $roles)
                            <tr>
                                <td>{{Str::upper($group)}}</td>
                                <td>
                                    @foreach ($roles as $role)
                                        @foreach ($role as $item)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-primary" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                            </svg>
                                            <label>{{__($item->role)}}</label>
                                            <br>
                                        @endforeach
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </form>        
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $('#edit').on('click', function() {
            edit();
        })

        $('.toast').toast('show')

    })
    
    function edit() {
        $('#edit svg').toggleClass('d-none');
        $('div.change_pass').toggleClass('d-none');
        $('button[type="submit"]').toggleClass('d-none');
        var inputs = $(':input');
        $.each(inputs, function(index, input) {
            if($(this).is('[readonly]')) {
                $(this).prop('readonly', false);
            }else {
                $(this).prop('readonly', true);
            }
        })

        if($('#group_id').prop('disabled')){
            $('#group_id').prop('disabled', false);
        }else {
            $('#group_id').prop('disabled', true);
        }
    }

    @if ($errors->any())    
        edit();
    @endif
</script>
@endsection