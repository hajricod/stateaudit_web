@if (!$folders->isEmpty() || !$files->isEmpty())
    <ul class="list-group-flush bg-white sub_folders_files p-0 {{lang() == 'ar'? 'pe-4':'ps-4'}}" id="sub_ul_{{$folder->id}}">
        @foreach ($folders as $folder)
            <li class="list-group-item d-flex justify-content-between align-items-center p-2 btn_folder" id="folder_{{$folder->id}}">
                <a href="" class="list-group-item-action text-decoration-none py-2" data-folder_id="{{$folder->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder text-primary" viewBox="0 0 16 16">
                        <path d="M.54 3.87L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z"/>
                    </svg>
                    {{lang() == 'ar' ? $folder->title : ($folder->title_en != '' ? $folder->title_en : $folder->title)}}
                </a>
            </li>
        @endforeach

        @foreach ($files as $file)
            @if (App\Models\Language::find($file->language_id)->locale == lang())
                <li class="list-group-item d-flex justify-content-between align-items-center p-2" id="file_{{$file->id}}">
                    <a href="{{asset('storage/library/'.$file->file_name)}}" class="list-group-item-action text-decoration-none py-2" target="_blank" title=" {{$file->title}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-fill text-warning" viewBox="0 0 16 16">
                            <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3z"/>
                        </svg>
                        {{$file->title}}.{{$file->type}}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
@endif 