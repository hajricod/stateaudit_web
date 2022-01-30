@extends('layouts.admin')

@section('content')

<h2>{{__('Audit Manuals and Standards')}}</h2>

<hr>


<div class="d-flex align-items-center">
    <div class="d-flex justify-content-start align-items-start">
        @can('group-admin',  App\Models\Group::find(Auth::user()->group_id))
            <button class="btn btn-primary rounded-circle ml-2 p-1" data-toggle="modal" data-target="#folderModal" data-folder_id="" data-sub_standard_folder_id="">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                    <path d="M.5 3l.04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                    <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </button>
        @endcan

        <p class="m-0 d-flex align-self-center px-3">
            <span>{{__('Folders')}} {{$standardFolders->count()}} </span>
        </p>
    </div>
</div>
<hr>




@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach ($errors->all() as $message)
        <p>{{$message}}</p>
    @endforeach
    <p></p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

<div class="folder-edge">
    <p class="m-0 d-flex justify-content-end">
        <a href="/admin/standards" class="btn btn-link">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
            </svg>

            {{-- {{__('Library')}} --}}
        </a> 
    </p>
</div>

<ul class="list-group-flush pr-0 pl-0">
    @foreach ($standardFolders as $folder)
        <li class="list-group-item d-flex justify-content-between align-items-center p-2 btn_folder" id="folder_{{$folder->id}}">
            
            <a href="" class="list-group-item-action py-2" data-folder="{{$folder}}" title="{{$folder->id}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder text-primary" viewBox="0 0 16 16">
                    <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                </svg>
                {{lang() == 'ar' ? $folder->title : $folder->title_en}}
            </a>

            <div class="dropdown">
                <button class="btn btn-link dropdown shadow-none" type="button" id="dropdownAction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-right text-right folder-dropdown" aria-labelledby="dropdownAction">

                    <button class="dropdown-item" data-toggle="modal" data-target="#folderModal" data-folder_id="{{$folder->id}}" data-sub_standard_folder_id={{$folder->sub_standard_folder_id}}>
                        {{__('Add Folder')}}
                    </button>
                    <button class="dropdown-item" data-toggle="modal" data-target="#folderEditModal"
                    data-folder="{{$folder}}">
                        {{__('Edit')}}
                    </button>

                    <form action="/admin/standards/destroy_folder/{{$folder->id}}" method="POST" class="deleteFolderForm">
                        @csrf
                        @method('delete')
                        <input type="hidden" class="folder_id" id="" name="folder_id" value="folder_{{$folder->id}}">
                        <button class="dropdown-item" type="submit">{{__('Delete')}}</button>
                    </form>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" data-toggle="modal" data-target="#fileModal" data-folder_id="{{$folder->id}}" data-sub_standard_folder_id={{$folder->sub_standard_folder_id}}>
                        {{__('Add File')}}
                    </button>
                </div>
            </div>
        </li>
    @endforeach

    @if ($standardFolders->isEmpty())
        <li class="list-group-item text-center">{{__('Nothing found')}}!</li>
    @endif
</ul>

{{-- @can('group-permission',  App\Models\Group::find($folder->group_id)) --}}
    <div class="modal fade" id="folderModal" tabindex="-1" role="dialog" aria-labelledby="folderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" dir="ltr">
            <h5 class="modal-title text-center w-100" id="folderModalLabel">مجلد جديد</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/admin/standards/store_folder" method="POST" id="addFolderForm">
                <div class="modal-body">
                    @csrf
                    {{-- <div class="form-group text-right" dir="rtl">
                        <label for="group" class="col-form-label">{{__('Group')}}</label>
                        <select name="group" id="group" class="form-control">
                            @foreach ($groups as $group)
                                <option value="{{$group->id}}">{{$group->title}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- <div class="form-group text-right" dir="rtl">
                        <label for="group" class="col-form-label">{{__('Permission')}}</label>
                        <select name="group" id="group" class="form-control">
                            @foreach ($permissions as $permission)
                                <option value="{{$permission->id}}">{{$permission->title}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group text-right" dir="rtl">
                        <label for="title" class="col-form-label">العنوان</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group text-left" dir="ltr">
                        <label for="title_en" class="col-form-label">Title</label>
                        <input type="text" class="form-control" id="title_en" name="title_en">
                    </div>

                    <input type="hidden" class="form-control folder_id" name="folder_id">
                    <input type="hidden" class="form-control sub_standard_folder_id" name="sub_standard_folder_id">

                    <div class="form-group text-right" dir="rtl">
                        <label for="description" class="col-form-label">الوصف</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group text-left" dir="ltr">
                        <label for="description_en" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description_en" name="description_en"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="modal fade" id="folderEditModal" tabindex="-1" role="dialog" aria-labelledby="folderEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" dir="ltr">
            <h5 class="modal-title text-center w-100" id="folderModalLabel">{{('Edit')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/standards/update_folder/" method="post" id="EditFolderForm">
                    @csrf
                    @method('put')
                    {{-- <div class="form-group text-right" dir="rtl">
                        <label for="group" class="col-form-label">{{__('Group')}}</label>
                        <select name="group_id" class="form-control">
                            @foreach ($groups as $group)
                                <option value="{{$group->id}}">{{$group->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group text-right" dir="rtl">
                        <label for="group" class="col-form-label">{{__('Permission')}}</label>
                        <select name="permission_id" class="form-control">
                            @foreach ($permissions as $permission)
                                <option value="{{$permission->id}}">{{$permission->title}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group ar">
                        <label for="title">العنوان</label>
                        <input type="text" name="title" id="title" class="form-control" value="">
                    </div>
                    <div class="form-group en">
                        <label for="title_en">Title</label>
                        <input type="text" name="title_en" id="title_en" class="form-control" value="">
                    </div>
                    <div class="form-group ar">
                        <label for="description">الوصف</label>
                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group en">
                        <label for="description_en">Description</label>
                        <textarea name="description_en" id="description_en" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" dir="ltr">
            <h5 class="modal-title text-center w-100" id="fileModalLabel">ملف جديد</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/admin/standards/store_file/" method="POST" enctype="multipart/form-data" id="addFileForm">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="language">{{__('Language')}}</label>
                        <select class="form-control" name="language_id" id="language_id">
                            @foreach ($languages as $language)
                                <option value="{{$language->id}}">{{$language->native}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">العنوان</label>
                        <input type="text" class="form-control" id="title" name="title">
                        @error('title')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                        <input type="hidden" class="form-control" id="folder_id" name="standard_folder_id">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">الوصف</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="attachment" id="attachment" class="btn btn-link">
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="modal fade" id="fileEditModal" tabindex="-1" role="dialog" aria-labelledby="fileEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" dir="ltr">
            <h5 class="modal-title text-center w-100" id="fileModalLabel">تعديل ملف</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/admin/standards/update_file" method="POST" enctype="multipart/form-data" id="EditFileForm">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="language">{{__('Language')}}</label>
                        <select class="form-control" name="language_id" id="language_id">
                            @foreach ($languages as $language)
                                <option value="{{$language->id}}">{{$language->native}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="title">{{__('Title')}}</label>
                        <input type="text" name="title" id="title" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="description">{{__('Description')}}</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="attachment">{{__('Current File')}}:</label>
                        <p class="px-2 text-primary" id="current_file"></p>
            
                        <label for="attachment">{{__('To Change a File')}}:</label>
                        <input type="hidden" name="current_file" id="current_file" value="">
                        <input type="file" name="attachment" id="attachment" class="btn btn-link">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
{{-- @endcan --}}

@endsection



@section('script')

<script>

$().ready(function() {

    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    $(document).on('click', 'li.btn_folder > a', function (e){

        e.preventDefault();

        $('li.btn_folder').css('background-color', '#fff');
        
        var folder = $(this).data('folder');
        var id     = folder.id;
        var open   = $(this).hasClass('open');

        $(this).toggleClass("open")

        if(open){

            $("ul#sub_ul_"+id).remove();

        }else {

            $(this).before(`
                <div class="d-flex justify-content-center px-2 spinner-holder">
                    <div class="spinner-border text-primary spinner-border-sm" role="status">
                    </div>
                </div>`
            );

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                }
            });

            $.ajax({
                url: "/admin/standards/sub_folders_files/"+id,
                type: "get",
                success: function(data) 
                {
                    $("#folder_"+id).after(data);
                    $(".spinner-holder").remove();
                }
            }) 
        }
        
    })
    
    $(document).on('submit', '#addFolderForm', function(e, csrf_token) {

        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        form.find("span.text-danger").remove();
    
        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                var id = form.find('input[name="folder_id"]').val();
                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                
                $('#folderModal').modal('hide')

                $(".folder-edge").before(`
                <div class="alert alert-success show fade" role="alert">
                    {{__('Details were updated successfully!')}}
                </div>`);

                setTimeout(() => {
                    $(".alert").alert('close')
                }, 3000);

            }, error: function(res) {

                var errors = res.responseJSON.errors;

                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                if(errors.title) {
                    form.find("input[name='title']").after(`<span class="text-danger">${errors.title}</span>`);
                }
                
                if(errors.description) {
                    form.find("textarea[name='description']").after(`<span class="text-danger">${errors.description}</span>`);
                }

            }
        });
    });

    $(document).on('submit', '#EditFolderForm', function(e, csrf_token) {

        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        form.find("span.text-danger").remove();

        $.ajax({
            type: "put",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                var id = form.find('input[name="folder_id"]').val();
                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                
                $('#folderEditModal').modal('hide')

                $(".folder-edge").before(`
                <div class="alert alert-success show fade" role="alert">
                    {{__('Details were updated successfully!')}}
                </div>`);

                setTimeout(() => {
                    $(".alert").alert('close')
                }, 3000);

            }, error: function(res) {

                var errors = res.responseJSON.errors;

                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                if(errors.title) {
                    form.find("input[name='title']").after(`<span class="text-danger">${errors.title}</span>`);
                }
                
                if(errors.description) {
                    form.find("textarea[name='description']").after(`<span class="text-danger">${errors.description}</span>`);
                }

            }
        });
    });

    $(document).on('submit', '.deleteFolderForm', function(e, csrf_token) {

        e.preventDefault();

        var form = $(this);
        var url  = form.attr('action');
        var id   = form.find('input[name="folder_id"]').val();

        form.find("span.text-danger").remove();

        $("div.alert").remove();

        $.ajax({
            type: "delete",
            url: url,
            data: form.serialize(),
            success: function()
            {
                
                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                $(`li#${id}`).remove();

            }, error: function(res) {

                $(`li#${id} .folder-dropdown`).dropdown('toggle')

                var errors = res.responseJSON;

                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                $(".folder-edge").before(`
                <div class="alert alert-danger show fade" role="alert">
                    ${errors.message}
                </div>`);

                setTimeout(() => {
                    $(".alert").alert('close')
                }, 3000);

            }
        });
    });

    $(document).on('submit', '.editFolderForm', function(e, csrf_token) {

        e.preventDefault();

        var form = $(this);
        var url  = form.attr('action');
        var id   = form.find('input[name="folder_id"]').val();

        form.find("span.text-danger").remove();

        $("div.alert").remove();

        $.ajax({
            type: "delete",
            url: url,
            data: form.serialize(),
            success: function()
            {
                
                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                $(`li#${id}`).remove();

            }, error: function(res) {

                $(`li#${id} .folder-dropdown`).dropdown('toggle')

                var errors = res.responseJSON;

                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                $(".folder-edge").before(`
                <div class="alert alert-danger show fade" role="alert">
                    ${errors.message}
                </div>`);

                setTimeout(() => {
                    $(".alert").alert('close')
                }, 3000);
            }
        });
    });

    $(document).on('submit', '#addFileForm', function(e, csrf_token) {

        e.preventDefault();

        var form     = $(this);
        var url      = form.attr('action');

        form.find("span.text-danger").remove();

        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data)
            {
                var id = form.find('input[name="folder_id"]').val();
                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                
                $('#fileModal').modal('hide')

                $(".folder-edge").before(`
                <div class="alert alert-success show fade" role="alert">
                    {{__('Details were updated successfully!')}}
                </div>`);

                setTimeout(() => {
                    $(".alert").alert('close')
                }, 3000);

            }, error: function(res) {

                var errors = res.responseJSON.errors;

                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                if(errors.title) {
                    form.find("input[name='title']").after(`<span class="text-danger">${errors.title}</span>`);
                }
                
                if(errors.description) {
                    form.find("textarea[name='description']").after(`<span class="text-danger">${errors.description}</span>`);
                }

                if(errors.attachment) {
                    form.find("input[name='attachment']").after(`<span class="text-danger d-block">${errors.attachment}</span>`);
                }

            }
        });
    });

    $(document).on('submit', '.deleteFileForm', function(e, csrf_token) {

        e.preventDefault();

        var form  = $(this);
        var url   = form.attr('action');
        var id    = form.find('input[name="file_id"]').val();

        form.find("span.text-danger").remove();

        $.ajax({
            type: "delete",
            url: url,
            data: form.serialize(),
            success: function(data)
            {
                
                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                $(`li#${id}`).remove();

            }, error: function(res) {

                $(`li#${id} .dropdown`).dropdown('toggle')

                var errors = res.responseJSON;

                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                $(".folder-edge").before(`
                <div class="alert alert-danger show fade" role="alert">
                    ${errors.message}
                </div>`);

                setTimeout(() => {
                    $(".alert").alert('close')
                }, 3000);

            }
        });
    });

    $(document).on('submit', '#EditFileForm', function(e, csrf_token) {

        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');

        var id = form.find('input[name="file_id"]').val();

        form.find("span.text-danger").remove();

        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data)
            {
                
                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                
                $('#fileEditModal').modal('hide')

                $(".folder-edge").before(`
                <div class="alert alert-success show fade" role="alert">
                    {{__('Details were updated successfully!')}}
                </div>`);

                setTimeout(() => {
                    $(".alert").alert('close')
                }, 3000);

            }, error: function(res) {


                var errors = res.responseJSON.errors;

                form.find('button').prop("disabled", false);
                form.find('button span.spinner-border').remove();

                if(errors.title) {
                    form.find("input[name='title']").after(`<span class="text-danger">${errors.title}</span>`);
                }

                if(errors.title_en) {
                    form.find("input[name='title_en']").after(`<span class="text-danger">${errors.title_en}</span>`);
                }
                
                if(errors.description) {
                    form.find("textarea[name='description']").after(`<span class="text-danger">${errors.description}</span>`);
                }

                if(errors.attachment) {
                    form.find("input[name='attachment']").after(`<span class="text-danger d-block">${errors.attachment}</span>`);
                }

            }
        });
    });

    $('#folderModal').on('show.bs.modal', function (event) {
        
        var button                 = $(event.relatedTarget);
        var folder_id              = button.data('folder_id');
        var sub_standard_folder_id = button.data('sub_standard_folder_id');
        var modal                  = $(this);

        modal.find('.modal-body input.folder_id').val(folder_id);
        modal.find('.modal-body input.sub_standard_folder_id').val(folder_id);
    })

    $('#folderEditModal').on('show.bs.modal', function (event) {
        
        var button         = $(event.relatedTarget);
        var folder         = button.data('folder');
        var modal          = $(this);

        modal.find('input[name="folder_id"]').val(folder.id);
        modal.find('input[name="sub_standard_folder_id"]').val(folder.id);
        modal.find('input[name="title"]').val(folder.title);
        modal.find('input[name="title_en"]').val(folder.title_en);
        modal.find('textarea[name="description"]').text(folder.description);
        modal.find('textarea[name="description_en"]').text(folder.description_en);
        modal.find("form").attr("action", "/admin/standards/update_folder/"+folder.id);
        modal.find('select[name="group_id"]').val(folder.group_id);
        modal.find('select[name="permission_id"]').val(folder.permission_id);
    })

    $('#fileModal').on('show.bs.modal', function (event) {
        
        var button        = $(event.relatedTarget);
        var folder_id     = button.data('folder_id');
        var modal = $(this);

        modal.find('.modal-body input#folder_id').val(folder_id);
    })

    $('#fileEditModal').on('show.bs.modal', function (event) {
        
        var button      = $(event.relatedTarget);
        var file        = button.data('file');
        var modal       = $(this);

        modal.find('.modal-body input#file_id').val(file.id);
        modal.find('.modal-body input#folder_id').val(file.folder_id);
        modal.find('.modal-body input#title').val(file.title);
        modal.find('.modal-body input#title_en').val(file.title_en);
        modal.find('.modal-body textarea#description').html(file.description);
        modal.find('.modal-body p#current_file').html(file.file_name);
        modal.find('.modal-body input#current_file').val(file.file_name);
        modal.find('.modal-body select#language_id ').val(file.language_id);
        modal.find("form").attr("action", "/admin/standards/update_file/"+file.id);
    })
});

</script>

@endsection