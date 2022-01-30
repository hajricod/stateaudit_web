@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="d-none alert alert-success alert-dismissible fade show px-3" role="alert" id="response_success">
        <p id="msg_success" class="mb-0"></p>
    </div>
    <div class="d-none alert alert-danger alert-dismissible fade show px-3" role="alert" id="response_error">
        <p id="msg_error" class="mb-0"></p>
    </div>

    <div class="row">
        <div class="col-md-12 pb-3" id="tables">
            <h4>{{__('Footer Section')}}</h4>
            <hr>
            <button class="btn btn-primary rounded-circle p-1"
            data-toggle="modal" 
            data-target="#addLinkModal" 
            data-action="">
                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>

            <div class="modal fade" id="addLinkModal" tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-0" dir="ltr">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('/admin/addFooterLink')}}" method="post" id="form_add_link">
                                @csrf
                                <div class="form-group">
                                    <label for="footer_cate_id">{{__('Group')}}</label>
                                    <select name="footer_cate_id" id="footer_cate_id" class="form-control">
                                        <option value="">{{__('Main')}}</option>
                                        @foreach ($footerCategories as $item)
                                            <option value="{{$item->id}}">{{lang() == 'ar' ? $item->title : $item->title_en}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-right" dir="rtl">
                                    <label for="title">العنوان</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="form-group text-left" dir="ltr">
                                    <label for="title_en">Title</label>
                                    <input type="text" name="title_en" class="form-control">
                                </div>
                                <div id="url" class="d-none form-group text-left" dir="ltr">
                                    <label for="url">{{__('URL')}}</label>
                                    <input type="text" name="url" class="form-control" disabled>
                                </div>
                                <div class="form-group text-left" dir="ltr">
                                    <label for="sort">{{__('Sort')}}</label>
                                    <input type="number" name="sort" class="form-control">
                                </div>
                                <div class="form-group text-left" dir="ltr">
                                    <label for="icon">{{__('Icon')}}</label>
                                    <textarea name="icon" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="status" checked>
                                    <label for="status">{{__('Status')}}</label>
                                </div>
                                <div id="show_title" class="form-group">
                                    <input type="checkbox" name="show_title" checked>
                                    <label for="show_title">{{__('Show Title')}}</label>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary add_link">{{__('Save')}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Discard')}}</button>
                        </div>
                    </div>
                </div>
            </div>


            <hr class="mb-3">
            <h5 class="px-3">{{__('Categories')}}</h5>
            <table class="table table-sm bg-white border" id="cate_table">
                <thead>
                    <tr class="text-center">
                        <th></th>
                        <th>العنوان</th>
                        <th>Title</th>
                        <th>{{__('Sort')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Actions')}}</th> 
                    </tr>
                </thead>
                <tbody id="footer_categories">
                    @foreach ($footerCategories as $item)
                        <tr id="link_{{$item->id}}">
                            <form action='{{url("/admin/updateFooterLinks/$item->id")}}' id="form_update_link_{{$item->id}}" method="POST">
                                @csrf
                                <td class="text-center">
                                    <input type="radio" name="id" class="" id="{{$item->id}}" value="{{$item->id}}" style="width: 15px" {{$item->id == $cate_id ? 'checked' : ''}}>
                                </td>
                                <td>
                                    <div class="group-control">
                                        <input type="text" class="form-control" name="title" value="{{$item->title}}" dir="rtl">
                                    </div>
                                </td>
                                <td>
                                    <div class="group-control">
                                        <input type="text" class="form-control" name="title_en" value="{{$item->title_en}}" dir="ltr">
                                    </div>
                                </td>
                                <td style="width: 100px">
                                    <div class="group-control">
                                        <input type="number" class="form-control" name="sort" value="{{$item->sort}}" dir="ltr">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="" id="{{$item->id}}" name="status" {{$item->status == 1 ? 'checked' : ''}}>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="actions" dir="ltr">

                                        <button 
                                        class="btn btn-light btnDelete" 
                                        data-toggle="modal" 
                                        data-target="#delete_link_modal_{{$item->id}}"
                                        type="button">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                            </svg>
                                        </button>

                                        <div class="modal fade" id="delete_link_modal_{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="false">
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
                                                        <button 
                                                        type="button" 
                                                        class="btn btn-primary delete_link" 
                                                        data-id="{{$item->id}}" 
                                                        data-action={{url("/admin/deleteFooterLink/$item->id")}} 
                                                        data-dismiss="modal">{{__('Yes')}}</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('No')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-light update_link" id="{{$item->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-save-fill text-success" viewBox="0 0 16 16">
                                                <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                                                </svg>
                                        </button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr class="my-3">
            <div class="d-none justify-content-center" id="spinner">
                <div class="spinner-border text-primary text-center" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            @include('admin.settings.footer.links')
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    $().ready(function(){
        $("input[type='radio']").on("change", function() {
            $("div#spinner").addClass("d-flex");
            $('#links_section').remove();
            $("input[type='radio']").prop('checked', false);
            $(this).prop('checked', true);

            var id = $(this).find("input[name='id']").val();
            var title = $(this).find("input[name='title']").val();
            var title_en = $(this).find("input[name='title_en']").val();

            var data = {
                "id":id,
                "title": title,
                "title_en": title_en
            }

            $.ajax({
                type: "GET",
                url: "/admin/footerLinks",
                data: $(this).serialize(),
                success: function (data) {
                    $("div#spinner").removeClass("d-flex");
                    $('#links_section').remove();
                    $('#tables').append(data);

                }
            });

        });

        $(document).on("change", "select[name=footer_cate_id]", function(e) {
            var id = $(this).val();

            if(id == "") {
                $("#show_title").addClass("d-none");
                $("#show_title > input").attr("disabled", true);
                $("#url").addClass("d-none");
                $("#url > input").attr("disabled", true);
            }else {
                $("#url").removeClass("d-none");
                $("#url > input").attr("disabled", false);
                $("#show_title").removeClass("d-none");
                $("#show_title > input").attr("disabled", false);
            }
        })

        $(document).on("click", "button.add_link", function(e) {

            e.preventDefault(e);

            var form_link_id    = "#form_add_link";
            var formData        = $(form_link_id).serialize();
            var formAction      = $(form_link_id).attr("action");

            $.ajax({
                type: "POST",
                url: formAction,
                data: formData,
                dataType: "json",
                encode: true,
                success:function(response){
                    successMessage(response);
                    $('#addLinkModal').modal('hide');
                },
                error: function (data) {

                    if(data.responseJSON.fail) {
                        $('#addLinkModal').modal('hide');
                        $("#response_error").toggleClass("d-none");
                        $("#msg_error").text(data.responseJSON.fail);

                        setTimeout(() => {
                            $("#response_error").toggleClass("d-none");
                        }, 2000);
                    }

                    $('#addLinkModal').find("p.text-danger").remove();

                    $.each(data.responseJSON.errors, function (key, value) { 
                        $('#addLinkModal').find("input[name='"+key+"']").after(`<p class='text-danger'>${value}</p>`)
                    });
                }
            });

        })

        $(document).on("click", "button.update_link", function(e) {

            e.preventDefault(e);

            var id              = $(this).attr("id");
            var form_link_id    = "#form_update_link_"+id;
            var link            = "#link_"+id;

            if($(form_link_id).length > 0 ) {
                
                var formData   = $(form_link_id).serialize();
                var formAction = $(form_link_id).attr("action");

                $.ajax({
                    type: "POST",
                    url: formAction,
                    data: formData,
                    dataType: "json",
                    encode: true,
                    success:function(response){
                        successMessage(response)
                    },
                    error: function (data) {
                        errorMessage(data, link)
                    }
                });
            }

        })

        $(document).on("click", "button.delete_link", function(e) {

            e.preventDefault(e);

            var id              = $(this).data("id");
            var link            = "#link_"+id;
            var action          = $(this).data("action");

            if(id) {

                var csrf_token = $('meta[name="csrf-token"]').attr('content');
            
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                    }
                });

                $.ajax({
                    type: "POST",
                    url: action,
                    data: id,
                    dataType: "json",
                    encode: true,
                    success:function(response){
                        successMessage(response)
                        $(link).remove();
                    },
                    error: function (data) {
                        errorMessage(data, link)
                    }
                });
            }

        })

        $(document).on("click", "button.update_sublink", function(e) {

            e.preventDefault(e);

            var id              = $(this).attr("id");
            var form_sublink_id = "#form_update_sublink_"+id;
            var sublink         = "#sublink_"+id;

            if($(form_sublink_id).length > 0 ) {

                var formData   = $(form_sublink_id).serialize();
                var formAction = $(form_sublink_id).attr("action");

                $.ajax({
                    type: "POST",
                    url: formAction,
                    data: formData,
                    dataType: "json",
                    encode: true,
                    success:function(response){
                        successMessage(response)
                    },
                    error: function (data) {
                        errorMessage(data, sublink)
                    }
                });
            }

        })

        $(document).on("click", "button.delete_sublink", function(e) {

            e.preventDefault(e);

            var id              = $(this).data("id");
            var link            = "#sublink_"+id;
            var action          = $(this).data("action");

            if(id) {

                var csrf_token = $('meta[name="csrf-token"]').attr('content');

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrf_token
                    }
                });

                $.ajax({
                    type: "POST",
                    url: action,
                    data: id,
                    dataType: "json",
                    encode: true,
                    success:function(response){
                        successMessage(response)
                        $(link).remove();
                    },
                    error: function (data) {
                        errorMessage(data, link)
                    }
                });
            }

        })

        function successMessage(response) {
            $("#response_success").toggleClass("d-none");
            $("#msg_success").text(response.success);

            setTimeout(() => {
                $("#response_success").toggleClass("d-none");
            }, 2000);
        }

        function errorMessage(data, id) {

            if(data.responseJSON.fail) {
                $("#response_error").toggleClass("d-none");
                $("#msg_error").text(data.responseJSON.fail);

                setTimeout(() => {
                    $("#response_error").toggleClass("d-none");
                }, 2000);
            }
            
            $.each(data.responseJSON.errors, function (key, value) {

                $(id).find("input[name='"+key+"']").addClass("border-danger");
                $(id).find("input[name='"+key+"']").after("<p class='text-danger position-absolute bg-white p-2' style='z-index:1'>"+value[0]+"</p>");

                setTimeout(() => {
                    $(id).find("input[name='"+key+"']").removeClass("border-danger");
                    $(id).find("p.text-danger").remove();
                }, 2000);
            })
        }
    })
</script>
@endsection