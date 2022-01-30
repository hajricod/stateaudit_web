@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col p-0">
            <div class="card border-0 rounded">
                <div class="card-body">
                    <div class="d-flex justify-cotent-start align-items-center">
                        <h2>{{__('Audit Manuals and Standards')}}</h2>
                    </div>
                    <hr>
                    <ul class="list-group-flush p-0">
                        @foreach ($standardFolders as $folder)
                            <li class="list-group-item d-flex justify-content-between align-items-center p-2 btn_folder" id="folder_{{$folder->id}}">
                                
                                <a href="" class="list-group-item-action text-decoration-none py-2" data-folder="{{$folder}}" title="{{lang() == 'ar' ? $folder->title : $folder->title_en}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder text-primary" viewBox="0 0 16 16">
                                        <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                                    </svg>
                                    {{lang() == 'ar' ? $folder->title : $folder->title_en}}
                                </a>
                            </li>
                        @endforeach

                        @if ($standardFolders->isEmpty())
                            <li class="list-group-item text-center">{{__('Nothing found')}}!</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

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
                url: "/standards/sub_folders_files/"+id,
                type: "get",
                success: function(data) 
                {
                    $("#folder_"+id).after(data);
                    $(".spinner-holder").remove();
                }
            }) 
        }
        
    });
});

</script>

@endsection